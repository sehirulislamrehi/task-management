import puppeteer from 'puppeteer';
import path from 'path';
import fs from 'fs';

const today = new Date();

const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, '0');
const day = String(today.getDate()).padStart(2, '0');
const formattedDate = `${year}-${month}-${day}`;

// Function to delete all files in a directory
function clearDirectory(directoryPath) {
    if (fs.existsSync(directoryPath)) {
        fs.readdir(directoryPath, (err, files) => {
            if (err) throw err;
            for (const file of files) {
                const filePath = path.join(directoryPath, file);
                fs.unlink(filePath, (err) => {
                    if (err) throw err;
                    console.log(`${filePath} was deleted`);
                });
            }
        });
    } else {
        // If directory doesn't exist, create it
        fs.mkdirSync(directoryPath, { recursive: true });
    }
}

(async () => {
    const browser = await puppeteer.launch({ headless: true, args: ['--no-sandbox', '--disable-setuid-sandbox'] });
    const page = await browser.newPage();
    // const url = "http://127.0.0.1:8000";
    const url = "https://crm.prangroup.com";

    // Step 1: Navigate to the login page
    await page.goto(`${url}/dev-mode`, { waitUntil: 'networkidle0' });

    // Step 2: Fill in the login form
    await page.type('input[name=email]', 'superadmin@gmail.com');
    await page.type('input[name=password]', '123456');

    // Step 3: Submit the login form
    await page.click('button[type=submit]');

    // Step 4: Wait for the navigation after login
    //   await page.waitForNavigation({ waitUntil: 'networkidle0' });

    await page.setViewport({
        width: 1500,   // Desired width in pixels
        height: 1500,   // Desired height in pixels
        deviceScaleFactor: 2,
    });

    let Arr = [1,2,3,4,5,6,7,9,11,15];

    for( let businessUnitId of Arr ){

        const directoryPath = path.resolve(`report/businessUnitId-${businessUnitId}`);

        // Clear the directory before saving new screenshots
        clearDirectory(directoryPath);

        // Step 5: Now navigate to the chart page (you are authenticated)
        await page.goto(`${url}/report-module/report-load/${businessUnitId}`, { waitUntil: 'networkidle0' });
        await new Promise(resolve => setTimeout(resolve, 1000));
        let screenshotPath = path.resolve(`${directoryPath}/report_${formattedDate}.png`);
        await page.screenshot({ path: screenshotPath, fullPage: true });

        console.log(`${screenshotPath} is created`);

    }

    await browser.close();
})();
