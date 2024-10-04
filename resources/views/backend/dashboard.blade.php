@extends("backend.template.layout")

@section('per_page_css')
<style>
    .small-box .inner h3 {
        font-size: 18px;
    }

    .card-report-item {
        padding: 15px;
    }
</style>
@endsection

@section('body-content')
<div class="br-mainpanel">
    <div class="br-pagetitle">
    </div>

    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today's Visits</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">1,975,224</p>
                            <span class="tx-11 tx-roboto tx-white-8">24% higher yesterday</span>
                        </div>
                    </div>
                    <div id="ch1" class="ht-50 tr-y-1 rickshaw_graph"><svg width="308" height="50">
                            <g>
                                <path d="M0,25Q22.244444444444444,19.291666666666664,25.666666666666664,19.374999999999996C30.799999999999997,19.499999999999996,46.199999999999996,25.0625,51.33333333333333,26.25S71.86666666666667,30.875,77,31.25S97.53333333333333,30.625,102.66666666666666,30S123.19999999999999,24.25,128.33333333333331,25S148.86666666666667,35.625,154,37.5S174.53333333333333,43.75,179.66666666666666,43.75S200.2,38.4375,205.33333333333331,37.5S225.86666666666667,35.3125,231,34.375S251.5333333333333,27.8125,256.66666666666663,28.125S277.2,37.8125,282.3333333333333,37.5Q285.75555555555553,37.291666666666664,308,25L308,50Q285.75555555555553,50,282.3333333333333,50C277.2,50,261.79999999999995,50,256.66666666666663,50S236.13333333333333,50,231,50S210.46666666666664,50,205.33333333333331,50S184.79999999999998,50,179.66666666666666,50S159.13333333333333,50,154,50S133.46666666666664,50,128.33333333333331,50S107.79999999999998,50,102.66666666666666,50S82.13333333333333,50,77,50S56.46666666666666,50,51.33333333333333,50S30.799999999999997,50,25.666666666666664,50Q22.244444444444444,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path>
                            </g>
                        </svg></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="bg-purple rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today Sales</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">$329,291</p>
                            <span class="tx-11 tx-roboto tx-white-8">$390,212 before tax</span>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1 rickshaw_graph"><svg width="308" height="50">
                            <g>
                                <path d="M0,25Q22.244444444444444,21.458333333333332,25.666666666666664,21.875C30.799999999999997,22.5,46.199999999999996,30.9375,51.33333333333333,31.25S71.86666666666667,26.25,77,25S97.53333333333333,18.75,102.66666666666666,18.75S123.19999999999999,23.125,128.33333333333331,25S148.86666666666667,35.625,154,37.5S174.53333333333333,43.75,179.66666666666666,43.75S200.2,38.4375,205.33333333333331,37.5S225.86666666666667,35.3125,231,34.375S251.5333333333333,27.8125,256.66666666666663,28.125S277.2,37.8125,282.3333333333333,37.5Q285.75555555555553,37.291666666666664,308,25L308,50Q285.75555555555553,50,282.3333333333333,50C277.2,50,261.79999999999995,50,256.66666666666663,50S236.13333333333333,50,231,50S210.46666666666664,50,205.33333333333331,50S184.79999999999998,50,179.66666666666666,50S159.13333333333333,50,154,50S133.46666666666664,50,128.33333333333331,50S107.79999999999998,50,102.66666666666666,50S82.13333333333333,50,77,50S56.46666666666666,50,51.33333333333333,50S30.799999999999997,50,25.666666666666664,50Q22.244444444444444,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path>
                            </g>
                        </svg></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-teal rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">% Unique Visits</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">54.45%</p>
                            <span class="tx-11 tx-roboto tx-white-8">23% average duration</span>
                        </div>
                    </div>
                    <div id="ch2" class="ht-50 tr-y-1 rickshaw_graph"><svg width="308" height="50">
                            <g>
                                <path d="M0,25Q22.244444444444444,40.541666666666664,25.666666666666664,40.625C30.799999999999997,40.75,46.199999999999996,27.8125,51.33333333333333,26.25S71.86666666666667,24.625,77,25S97.53333333333333,30.625,102.66666666666666,30S123.19999999999999,20.8125,128.33333333333331,18.75S148.86666666666667,10.625,154,9.375S174.53333333333333,5,179.66666666666666,6.25S200.2,20.9375,205.33333333333331,21.875S225.86666666666667,16.5625,231,15.625S251.5333333333333,12.1875,256.66666666666663,12.5S277.2,17.5,282.3333333333333,18.75Q285.75555555555553,19.583333333333332,308,25L308,50Q285.75555555555553,50,282.3333333333333,50C277.2,50,261.79999999999995,50,256.66666666666663,50S236.13333333333333,50,231,50S210.46666666666664,50,205.33333333333331,50S184.79999999999998,50,179.66666666666666,50S159.13333333333333,50,154,50S133.46666666666664,50,128.33333333333331,50S107.79999999999998,50,102.66666666666666,50S82.13333333333333,50,77,50S56.46666666666666,50,51.33333333333333,50S30.799999999999997,50,25.666666666666664,50Q22.244444444444444,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path>
                            </g>
                        </svg></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-primary rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Bounce Rate</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">32.16%</p>
                            <span class="tx-11 tx-roboto tx-white-8">65.45% on average time</span>
                        </div>
                    </div>
                    <div id="ch4" class="ht-50 tr-y-1 rickshaw_graph"><svg width="308" height="50">
                            <g>
                                <path d="M0,25Q22.244444444444444,21.458333333333332,25.666666666666664,21.875C30.799999999999997,22.5,46.199999999999996,30.9375,51.33333333333333,31.25S71.86666666666667,26.25,77,25S97.53333333333333,18.75,102.66666666666666,18.75S123.19999999999999,23.125,128.33333333333331,25S148.86666666666667,35.625,154,37.5S174.53333333333333,43.75,179.66666666666666,43.75S200.2,38.4375,205.33333333333331,37.5S225.86666666666667,35.3125,231,34.375S251.5333333333333,27.8125,256.66666666666663,28.125S277.2,37.8125,282.3333333333333,37.5Q285.75555555555553,37.291666666666664,308,25L308,50Q285.75555555555553,50,282.3333333333333,50C277.2,50,261.79999999999995,50,256.66666666666663,50S236.13333333333333,50,231,50S210.46666666666664,50,205.33333333333331,50S184.79999999999998,50,179.66666666666666,50S159.13333333333333,50,154,50S133.46666666666664,50,128.33333333333331,50S107.79999999999998,50,102.66666666666666,50S82.13333333333333,50,77,50S56.46666666666666,50,51.33333333333333,50S30.799999999999997,50,25.666666666666664,50Q22.244444444444444,50,0,50Z" class="area" fill="rgba(255,255,255,0.5)"></path>
                            </g>
                        </svg></div>
                </div>
            </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
            <div class="col-lg-8">
                <div class="card bd-0 shadow-base">
                    <div class="d-md-flex justify-content-between pd-25">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">How Engaged Our Users Daily</h6>
                            <p>Past 30 Days — Last Updated Oct 14, 2017</p>
                        </div>
                        <div class="d-sm-flex">
                            <div>
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Bounce Rate</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">23.32%</h4>
                                <span class="tx-12 tx-success tx-roboto">2.7% increased</span>
                            </div>
                            <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Page Views</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">38.20%</h4>
                                <span class="tx-12 tx-danger tx-roboto">4.65% decreased</span>
                            </div>
                            <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Time On Site</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">12:30</h4>
                                <span class="tx-12 tx-success tx-roboto">1.22% increased</span>
                            </div>
                        </div><!-- d-flex -->
                    </div><!-- d-flex -->

                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <div id="ch5" class="ht-250 ht-sm-300" style="padding: 0px; position: relative;"><canvas class="flot-base" width="815" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 815.328px; height: 300px;"></canvas>
                            <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 20px; text-align: center;">0</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 103px; text-align: center;">2</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 185px; text-align: center;">4</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 268px; text-align: center;">6</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 350px; text-align: center;">8</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 431px; text-align: center;">10</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 514px; text-align: center;">12</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 596px; text-align: center;">14</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 679px; text-align: center;">16</div>
                                    <div style="position: absolute; max-width: 74px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 761px; text-align: center;">18</div>
                                </div>
                                <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                                    <div style="position: absolute; top: 277px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 4px; text-align: right;">0.0</div>
                                    <div style="position: absolute; top: 231px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">2.5</div>
                                    <div style="position: absolute; top: 185px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">5.0</div>
                                    <div style="position: absolute; top: 140px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 7px; text-align: right;">7.5</div>
                                    <div style="position: absolute; top: 94px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 0px; text-align: right;">10.0</div>
                                    <div style="position: absolute; top: 48px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">12.5</div>
                                    <div style="position: absolute; top: 2px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 0px; text-align: right;">15.0</div>
                                </div>
                            </div><canvas class="flot-overlay" width="815" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 815.328px; height: 300px;"></canvas>
                            <div class="legend">
                                <div style="position: absolute; width: 80.25px; height: 37px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                                <table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454">
                                    <tbody>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div style="width:4px;height:0;border:5px solid #17A2B8;overflow:hidden"></div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Bounce Rate</td>
                                        </tr>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div style="width:4px;height:0;border:5px solid #4E6577;overflow:hidden"></div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Page Views</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- card -->

                <div class="card bd-0 shadow-base pd-25 mg-t-20">
                    <div class="d-md-flex justify-content-between">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">How Engaged Our Users Daily</h6>
                            <p>Past 30 Days — Last Updated Oct 14, 2017</p>
                        </div>
                        <div class="wd-200">
                            <select class="form-control select2 select2-hidden-accessible" data-placeholder="Choose location" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option label="Choose one"></option>
                                <option value="1" selected="" data-select2-id="3">New York</option>
                                <option value="2">San Francisco</option>
                                <option value="3">Los Angeles</option>
                                <option value="4">Chicago</option>
                                <option value="5">Seattle</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 200px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ydk0-container"><span class="select2-selection__rendered" id="select2-ydk0-container" role="textbox" aria-readonly="true" title="New York">New York</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div><!-- wd-200 -->
                    </div><!-- d-flex -->
                    <div class="row mg-t-20">
                        <div class="col-sm-9">
                            <div id="ch12" class="ht-250 ht-sm-300" _echarts_instance_="ec_1712675835116" style="-webkit-tap-highlight-color: transparent; user-select: none;">
                                <div style="position: relative; overflow: hidden; width: 596px; height: 300px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="596" height="300" style="position: absolute; left: 0px; top: 0px; width: 596px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
                            </div>
                        </div><!-- col-9 -->
                        <div class="col-sm-3 mg-t-40 mg-sm-t-0">
                            <div>
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Bounce Rate</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">23.32%</h4>
                                <span class="tx-12 tx-success tx-roboto">2.7% increased</span>
                            </div>
                            <div class="mg-t-20 pd-t-20 bd-t">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Page Views</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">38.20%</h4>
                                <span class="tx-12 tx-danger tx-roboto">4.65% decreased</span>
                            </div>
                            <div class="mg-t-20 pd-t-20 bd-t">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Time On Site</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">12:30</h4>
                                <span class="tx-12 tx-success tx-roboto">1.22% increased</span>
                            </div>
                        </div><!-- col-3 -->
                    </div><!-- row -->
                </div><!-- card -->

                <div class="card shadow-base bd-0 pd-25 mg-t-20">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Delivery Overview</h6>
                            <p class="mg-b-0">Past 30 Days — Last Updated Oct 20, 2017</p>
                        </div>
                        <div class="wd-200 mg-t-20 mg-md-t-0">
                            <select class="form-control select2 select2-hidden-accessible" data-placeholder="Choose location" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                <option label="Choose one"></option>
                                <option value="1" selected="" data-select2-id="6">New York</option>
                                <option value="2">San Francisco</option>
                                <option value="3">Los Angeles</option>
                                <option value="4">Chicago</option>
                                <option value="5">Seattle</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 200px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ykzk-container"><span class="select2-selection__rendered" id="select2-ykzk-container" role="textbox" aria-readonly="true" title="New York">New York</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div><!-- wd-200 -->
                    </div><!-- d-flex -->

                    <div id="mapShiftWorker" class="ht-300 ht-sm-400 mg-t-25" style="position: relative; overflow: hidden;">
                        <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                            <div><button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="background: none transparent; display: block; border: none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; z-index: 1000002; outline-offset: 3px; right: 0px; bottom: 0px; transform: translateX(100%);"></button></div>
                            <div tabindex="0" aria-label="Map" aria-roledescription="map" role="region" aria-describedby="9DE1A35E-222D-4393-B912-84FFF58AD931" style="position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;">
                                <div id="9DE1A35E-222D-4393-B912-84FFF58AD931" style="display: none;">
                                    <div class="LGLeeN-keyboard-shortcuts-view">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><kbd aria-label="Left arrow">←</kbd></td>
                                                    <td aria-label="Move left.">Move left</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd aria-label="Right arrow">→</kbd></td>
                                                    <td aria-label="Move right.">Move right</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd aria-label="Up arrow">↑</kbd></td>
                                                    <td aria-label="Move up.">Move up</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd aria-label="Down arrow">↓</kbd></td>
                                                    <td aria-label="Move down.">Move down</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd>+</kbd></td>
                                                    <td aria-label="Zoom in.">Zoom in</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd>-</kbd></td>
                                                    <td aria-label="Zoom out.">Zoom out</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd>Home</kbd></td>
                                                    <td aria-label="Jump left by 75%.">Jump left by 75%</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd>End</kbd></td>
                                                    <td aria-label="Jump right by 75%.">Jump right by 75%</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd>Page Up</kbd></td>
                                                    <td aria-label="Jump up by 75%.">Jump up by 75%</td>
                                                </tr>
                                                <tr>
                                                    <td><kbd>Page Down</kbd></td>
                                                    <td aria-label="Jump down by 75%.">Jump down by 75%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                                <div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">
                                    <div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);">
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                <div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -88, -180);">
                                                    <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                    <div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;">
                                                        <div style="width: 256px; height: 256px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                            <div style="position: absolute; z-index: 986; transform: matrix(1, 0, 0, 1, -88, -180);">
                                                <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4824!3i6160!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=92604" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4823!3i6160!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=94568" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4823!3i6159!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=51541" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4824!3i6159!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=49577" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4825!3i6159!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=47613" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4825!3i6160!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=90640" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4825!3i6161!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=60412" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4824!3i6161!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=62376" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4823!3i6161!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=64340" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4822!3i6161!4i256!2m3!1e0!2sm!3i688433101!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=126592" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4822!3i6160!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=96532" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                                <div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i14!2i4822!3i6159!4i256!2m3!1e0!2sm!3i688433113!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg&amp;token=53505" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                                        <div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);">
                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><span id="2EADB707-B3C6-433A-A9D0-7ACA927C443D" style="display: none;">To navigate, press the arrow keys.</span></div>
                                            <div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
                                        </div>
                                    </div>
                                    <div class="gm-style-moc" style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
                                        <p class="gm-style-mot"></p>
                                    </div>
                                </div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none; opacity: 0;"></iframe>
                                <div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div>
                                <div>
                                    <div class="gmnoprint gm-bundled-control" draggable="false" data-control-width="40" data-control-height="81" style="margin: 10px; user-select: none; position: absolute; left: 0px; top: 0px;">
                                        <div class="gmnoprint" data-control-width="40" data-control-height="81" style="position: absolute; left: 0px; top: 0px;">
                                            <div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" aria-label="Zoom in" title="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button>
                                                <div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" aria-label="Zoom out" title="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div><button draggable="false" aria-label="Toggle fullscreen view" title="Toggle fullscreen view" type="button" aria-pressed="false" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div>
                                    <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" data-control-width="0" data-control-height="0" style="margin: 10px; user-select: none; position: absolute; display: none; bottom: 14px; right: 0px;">
                                        <div class="gmnoprint" data-control-width="40" data-control-height="40" style="display: none; position: absolute;">
                                            <div style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;"><button draggable="false" aria-label="Rotate map clockwise" title="Rotate map clockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"></button>
                                                <div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" aria-label="Rotate map counterclockwise" title="Rotate map counterclockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"></button>
                                                <div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" aria-label="Tilt map" title="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"></button>
                                            </div>
                                        </div><button draggable="false" aria-label="Drag Pegman onto the map to open Street View" title="Drag Pegman onto the map to open Street View" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; left: 0px; top: 0px;"></button>
                                    </div>
                                </div>
                                <div>
                                    <div style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" title="Open this area in Google Maps (opens a new window)" aria-label="Open this area in Google Maps (opens a new window)" href="https://maps.google.com/maps?ll=40.702247,-73.996349&amp;z=14&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" style="display: inline;">
                                            <div style="width: 66px; height: 26px;"><img alt="Google" src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2069%2029%22%3E%3Cg%20opacity%3D%22.3%22%20fill%3D%22%23000%22%20stroke%3D%22%23000%22%20stroke-width%3D%221.5%22%3E%3Cpath%20d%3D%22M17.4706%207.33616L18.0118%206.79504%2017.4599%206.26493C16.0963%204.95519%2014.2582%203.94522%2011.7008%203.94522c-4.613699999999999%200-8.50262%203.7551699999999997-8.50262%208.395779999999998C3.19818%2016.9817%207.0871%2020.7368%2011.7008%2020.7368%2014.1712%2020.7368%2016.0773%2019.918%2017.574%2018.3689%2019.1435%2016.796%2019.5956%2014.6326%2019.5956%2012.957%2019.5956%2012.4338%2019.5516%2011.9316%2019.4661%2011.5041L19.3455%2010.9012H10.9508V14.4954H15.7809C15.6085%2015.092%2015.3488%2015.524%2015.0318%2015.8415%2014.403%2016.4629%2013.4495%2017.1509%2011.7008%2017.1509%209.04835%2017.1509%206.96482%2015.0197%206.96482%2012.341%206.96482%209.66239%209.04835%207.53119%2011.7008%207.53119%2013.137%207.53119%2014.176%208.09189%2014.9578%208.82348L15.4876%209.31922%2016.0006%208.80619%2017.4706%207.33616z%22/%3E%3Cpath%20d%3D%22M24.8656%2020.7286C27.9546%2020.7286%2030.4692%2018.3094%2030.4692%2015.0594%2030.4692%2011.7913%2027.953%209.39009%2024.8656%209.39009%2021.7783%209.39009%2019.2621%2011.7913%2019.2621%2015.0594c0%203.25%202.514499999999998%205.6692%205.6035%205.6692zM24.8656%2012.8282C25.8796%2012.8282%2026.8422%2013.6652%2026.8422%2015.0594%2026.8422%2016.4399%2025.8769%2017.2905%2024.8656%2017.2905%2023.8557%2017.2905%2022.8891%2016.4331%2022.8891%2015.0594%2022.8891%2013.672%2023.853%2012.8282%2024.8656%2012.8282z%22/%3E%3Cpath%20d%3D%22M35.7511%2017.2905v0H35.7469C34.737%2017.2905%2033.7703%2016.4331%2033.7703%2015.0594%2033.7703%2013.672%2034.7343%2012.8282%2035.7469%2012.8282%2036.7608%2012.8282%2037.7234%2013.6652%2037.7234%2015.0594%2037.7234%2016.4439%2036.7554%2017.2961%2035.7511%2017.2905zM35.7387%2020.7286C38.8277%2020.7286%2041.3422%2018.3094%2041.3422%2015.0594%2041.3422%2011.7913%2038.826%209.39009%2035.7387%209.39009%2032.6513%209.39009%2030.1351%2011.7913%2030.1351%2015.0594%2030.1351%2018.3102%2032.6587%2020.7286%2035.7387%2020.7286z%22/%3E%3Cpath%20d%3D%22M51.953%2010.4357V9.68573H48.3999V9.80826C47.8499%209.54648%2047.1977%209.38187%2046.4808%209.38187%2043.5971%209.38187%2041.0168%2011.8998%2041.0168%2015.0758%2041.0168%2017.2027%2042.1808%2019.0237%2043.8201%2019.9895L43.7543%2020.0168%2041.8737%2020.797%2041.1808%2021.0844%2041.4684%2021.7772C42.0912%2023.2776%2043.746%2025.1469%2046.5219%2025.1469%2047.9324%2025.1469%2049.3089%2024.7324%2050.3359%2023.7376%2051.3691%2022.7367%2051.953%2021.2411%2051.953%2019.2723v-8.8366zm-7.2194%209.9844L44.7334%2020.4196C45.2886%2020.6201%2045.878%2020.7286%2046.4808%2020.7286%2047.1616%2020.7286%2047.7866%2020.5819%2048.3218%2020.3395%2048.2342%2020.7286%2048.0801%2021.0105%2047.8966%2021.2077%2047.6154%2021.5099%2047.1764%2021.7088%2046.5219%2021.7088%2045.61%2021.7088%2045.0018%2021.0612%2044.7336%2020.4201zM46.6697%2012.8282C47.6419%2012.8282%2048.5477%2013.6765%2048.5477%2015.084%2048.5477%2016.4636%2047.6521%2017.2987%2046.6697%2017.2987%2045.6269%2017.2987%2044.6767%2016.4249%2044.6767%2015.084%2044.6767%2013.7086%2045.6362%2012.8282%2046.6697%2012.8282zM55.7387%205.22081v-.75H52.0788V20.4412H55.7387V5.22081z%22/%3E%3Cpath%20d%3D%22M63.9128%2016.0614L63.2945%2015.6492%2062.8766%2016.2637C62.4204%2016.9346%2061.8664%2017.3069%2061.0741%2017.3069%2060.6435%2017.3069%2060.3146%2017.2088%2060.0544%2017.0447%2059.9844%2017.0006%2059.9161%2016.9496%2059.8498%2016.8911L65.5497%2014.5286%2066.2322%2014.2456%2065.9596%2013.5589%2065.7406%2013.0075C65.2878%2011.8%2063.8507%209.39832%2060.8278%209.39832%2057.8445%209.39832%2055.5034%2011.7619%2055.5034%2015.0676%2055.5034%2018.2151%2057.8256%2020.7369%2061.0659%2020.7369%2063.6702%2020.7369%2065.177%2019.1378%2065.7942%2018.2213L66.2152%2017.5963%2065.5882%2017.1783%2063.9128%2016.0614zM61.3461%2012.8511L59.4108%2013.6526C59.7903%2013.0783%2060.4215%2012.7954%2060.9017%2012.7954%2061.067%2012.7954%2061.2153%2012.8161%2061.3461%2012.8511z%22/%3E%3C/g%3E%3Cpath%20d%3D%22M11.7008%2019.9868C7.48776%2019.9868%203.94818%2016.554%203.94818%2012.341%203.94818%208.12803%207.48776%204.69522%2011.7008%204.69522%2014.0331%204.69522%2015.692%205.60681%2016.9403%206.80583L15.4703%208.27586C14.5751%207.43819%2013.3597%206.78119%2011.7008%206.78119%208.62108%206.78119%206.21482%209.26135%206.21482%2012.341%206.21482%2015.4207%208.62108%2017.9009%2011.7008%2017.9009%2013.6964%2017.9009%2014.8297%2017.0961%2015.5606%2016.3734%2016.1601%2015.7738%2016.5461%2014.9197%2016.6939%2013.7454h-4.9931V11.6512h7.0298C18.8045%2012.0207%2018.8456%2012.4724%2018.8456%2012.957%2018.8456%2014.5255%2018.4186%2016.4637%2017.0389%2017.8434%2015.692%2019.2395%2013.9838%2019.9868%2011.7008%2019.9868zM29.7192%2015.0594C29.7192%2017.8927%2027.5429%2019.9786%2024.8656%2019.9786%2022.1884%2019.9786%2020.0121%2017.8927%2020.0121%2015.0594%2020.0121%2012.2096%2022.1884%2010.1401%2024.8656%2010.1401%2027.5429%2010.1401%2029.7192%2012.2096%2029.7192%2015.0594zM27.5922%2015.0594C27.5922%2013.2855%2026.3274%2012.0782%2024.8656%2012.0782S22.1391%2013.2937%2022.1391%2015.0594C22.1391%2016.8086%2023.4038%2018.0405%2024.8656%2018.0405S27.5922%2016.8168%2027.5922%2015.0594zM40.5922%2015.0594C40.5922%2017.8927%2038.4159%2019.9786%2035.7387%2019.9786%2033.0696%2019.9786%2030.8851%2017.8927%2030.8851%2015.0594%2030.8851%2012.2096%2033.0614%2010.1401%2035.7387%2010.1401%2038.4159%2010.1401%2040.5922%2012.2096%2040.5922%2015.0594zM38.4734%2015.0594C38.4734%2013.2855%2037.2087%2012.0782%2035.7469%2012.0782%2034.2851%2012.0782%2033.0203%2013.2937%2033.0203%2015.0594%2033.0203%2016.8086%2034.2851%2018.0405%2035.7469%2018.0405%2037.2087%2018.0487%2038.4734%2016.8168%2038.4734%2015.0594zM51.203%2010.4357v8.8366C51.203%2022.9105%2049.0595%2024.3969%2046.5219%2024.3969%2044.132%2024.3969%2042.7031%2022.7955%2042.161%2021.4897L44.0417%2020.7095C44.3784%2021.5143%2045.1997%2022.4588%2046.5219%2022.4588%2048.1479%2022.4588%2049.1499%2021.4487%2049.1499%2019.568V18.8617H49.0759C48.5914%2019.4612%2047.6552%2019.9786%2046.4808%2019.9786%2044.0171%2019.9786%2041.7668%2017.8352%2041.7668%2015.0758%2041.7668%2012.3%2044.0253%2010.1319%2046.4808%2010.1319%2047.6552%2010.1319%2048.5914%2010.6575%2049.0759%2011.2323H49.1499V10.4357H51.203zM49.2977%2015.084C49.2977%2013.3512%2048.1397%2012.0782%2046.6697%2012.0782%2045.175%2012.0782%2043.9267%2013.3429%2043.9267%2015.084%2043.9267%2016.8004%2045.175%2018.0487%2046.6697%2018.0487%2048.1397%2018.0487%2049.2977%2016.8004%2049.2977%2015.084zM54.9887%205.22081V19.6912H52.8288V5.22081H54.9887zM63.4968%2016.6854L65.1722%2017.8023C64.6301%2018.6072%2063.3244%2019.9869%2061.0659%2019.9869%2058.2655%2019.9869%2056.2534%2017.827%2056.2534%2015.0676%2056.2534%2012.1439%2058.2901%2010.1483%2060.8278%2010.1483%2063.3818%2010.1483%2064.6301%2012.1768%2065.0408%2013.2773L65.2625%2013.8357%2058.6843%2016.5623C59.1853%2017.5478%2059.9737%2018.0569%2061.0741%2018.0569%2062.1746%2018.0569%2062.9384%2017.5067%2063.4968%2016.6854zM58.3312%2014.9115L62.7331%2013.0884C62.4867%2012.4724%2061.764%2012.0454%2060.9017%2012.0454%2059.8012%2012.0454%2058.2737%2013.0145%2058.3312%2014.9115z%22%20fill%3D%22%23fff%22/%3E%3C/svg%3E" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div>
                                        </a></div>
                                </div>
                                <div></div>
                                <div>
                                    <div style="display: inline-flex; position: absolute; right: 0px; bottom: 0px;">
                                        <div class="gmnoprint" style="z-index: 1000001;">
                                            <div draggable="false" class="gm-style-cc" style="user-select: none; position: relative; height: 14px; line-height: 14px;">
                                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                    <div style="width: 1px;"></div>
                                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                </div>
                                                <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="background: none; display: inline-block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Keyboard shortcuts</button></div>
                                            </div>
                                        </div>
                                        <div class="gmnoprint" style="z-index: 1000001;">
                                            <div draggable="false" class="gm-style-cc" style="user-select: none; position: relative; height: 14px; line-height: 14px;">
                                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                    <div style="width: 1px;"></div>
                                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                </div>
                                                <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><button draggable="false" aria-label="Map Data" title="Map Data" type="button" style="background: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit; display: none;">Map Data</button><span style="">Map data ©2024 Google</span></div>
                                            </div>
                                        </div>
                                        <div class="gmnoscreen">
                                            <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2024 Google</div>
                                        </div><button draggable="false" aria-label="Map Scale: 500 m per 69 pixels" title="Map Scale: 500 m per 69 pixels" type="button" class="gm-style-cc" aria-describedby="7CA4319C-509E-47E9-A507-633C2DB0FEDC" style="background: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; height: 14px; line-height: 14px;">
                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                <div style="width: 1px;"></div>
                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                            </div>
                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><span>500 m&nbsp;</span>
                                                <div style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 73px;">
                                                    <div style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;"></div>
                                                    <div style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"></div>
                                                    <div style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); right: 0px; bottom: 0px;"></div>
                                                    <div style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;"></div>
                                                    <div style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);"></div>
                                                    <div style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;"></div>
                                                </div>
                                            </div><span id="7CA4319C-509E-47E9-A507-633C2DB0FEDC" style="display: none;">Click to toggle between metric and imperial units</span>
                                        </button>
                                        <div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; position: relative; height: 14px; line-height: 14px;">
                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                <div style="width: 1px;"></div>
                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                            </div>
                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms</a></div>
                                        </div>
                                        <div draggable="false" class="gm-style-cc" style="user-select: none; position: relative; height: 14px; line-height: 14px; display: none;">
                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                <div style="width: 1px;"></div>
                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                            </div>
                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@40.702247,-73.996349,14z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report a map error</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;">
                            <div><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg" draggable="false" style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;"></div>
                            <div style="line-height: 20px; margin: 15px 0px;"><span style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">This page can't load Google Maps correctly.</span></div>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="line-height: 16px; vertical-align: middle;"><a href="http://g.co/dev/maps-no-account" target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Do you own this website?</a></td>
                                    <td style="text-align: right;"><button class="dismissButton">OK</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row row-xs mg-t-25">
                        <div class="col-sm-4">
                            <div class="tx-center pd-y-15 bd">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">New Deliveries</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">12,344</h4>
                                <span class="tx-12 tx-danger tx-roboto">2.7% increased</span>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                            <div class="tx-center pd-y-15 bd">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Delivered</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">24,333</h4>
                                <span class="tx-12 tx-danger tx-roboto">2.7% decreased</span>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                            <div class="tx-center pd-y-15 bd">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Returned</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">432</h4>
                                <span class="tx-12 tx-success tx-roboto">2.7% decreased</span>
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->

                </div><!-- card -->


            </div><!-- col-8 -->
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">

                <div class="card shadow-base bd-0 overflow-hidden">
                    <div class="pd-x-25 pd-t-25">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1 mg-b-20">Storage Overview</h6>
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-0">As of Today</p>
                        <h1 class="tx-56 tx-light tx-inverse mg-b-0">755<span class="tx-teal tx-24">gb</span></h1>
                        <p><span class="tx-primary">80%</span> of free space remaining</p>
                    </div><!-- pd-x-25 -->
                    <div id="ch6" class="ht-115 mg-r--1 rickshaw_graph"><svg width="418" height="115">
                            <g>
                                <path d="M0,23Q30.188888888888886,1.993333333333331,34.83333333333333,2.299999999999997C41.79999999999999,2.7599999999999967,62.69999999999999,23.229999999999997,69.66666666666666,27.599999999999994S97.53333333333333,44.62,104.5,46S132.36666666666665,43.69999999999999,139.33333333333331,41.39999999999999S167.2,20.24,174.16666666666666,23S202.03333333333333,62.1,209,69S236.86666666666665,92,243.83333333333331,92S271.7,72.45,278.66666666666663,69S306.53333333333336,60.95,313.5,57.5S341.3666666666667,33.34999999999999,348.3333333333333,34.499999999999986S376.2,70.14999999999999,383.16666666666663,69Q387.8111111111111,68.23333333333333,418,23L418,115Q387.8111111111111,115,383.16666666666663,115C376.2,115,355.29999999999995,115,348.3333333333333,115S320.46666666666664,115,313.5,115S285.63333333333327,115,278.66666666666663,115S250.79999999999998,115,243.83333333333331,115S215.96666666666667,115,209,115S181.13333333333333,115,174.16666666666666,115S146.29999999999998,115,139.33333333333331,115S111.46666666666667,115,104.5,115S76.63333333333333,115,69.66666666666666,115S41.79999999999999,115,34.83333333333333,115Q30.188888888888886,115,0,115Z" class="area" fill="#1CAF9A"></path>
                            </g>
                        </svg></div>
                    <div class="bg-teal pd-x-25 pd-b-25 d-flex justify-content-between">
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">989<span class="tx-light op-8 tx-20">gb</span></h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Total Space</p>
                        </div>
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">234<span class="tx-light op-8 tx-20">gb</span></h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Used Space</p>
                        </div>
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">80<span class="tx-light op-8 tx-20">%</span></h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Free Space</p>
                        </div>
                    </div>
                </div><!-- card -->

                <div class="card shadow-base bd-0 mg-t-20">
                    <div id="carousel3" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel3" data-slide-to="0" class=""></li>
                            <li data-target="#carousel3" data-slide-to="1" class="active"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item">
                                <div class="bg-white ht-300 pos-relative overflow-hidden d-flex flex-column align-items-start rounded">
                                    <div class="pos-absolute t-15 r-25">
                                        <a href="" class="tx-gray-500 hover-info mg-l-7"><i class="icon ion-more tx-20"></i></a>
                                    </div>
                                    <div class="pd-x-30 pd-t-30 mg-b-auto">
                                        <p class="tx-info tx-uppercase tx-11 tx-semibold tx-mont mg-b-5">Product Item #1</p>
                                        <h5 class="tx-inverse mg-b-20">Samsung Galaxy S8</h5>
                                        <p class="tx-uppercase tx-11 tx-semibold tx-mont mg-b-0">Purchases</p>
                                        <h2 class="tx-inverse tx-lato tx-bold mg-b-0">2366</h2>
                                        <span>53.86 purchases/month</span>
                                    </div>
                                    <div id="ch10" class="ht-100 tr-y-1 rickshaw_graph"><svg width="400" height="100">
                                            <rect x="0" y="20" width="29.23076923076923" height="80" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="30.76923076923077" y="2" width="29.23076923076923" height="98" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="61.53846153846154" y="24" width="29.23076923076923" height="76" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="92.3076923076923" y="40" width="29.23076923076923" height="60" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="123.07692307692308" y="36" width="29.23076923076923" height="64" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="153.84615384615387" y="20" width="29.23076923076923" height="80" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="184.6153846153846" y="60" width="29.23076923076923" height="40" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="215.38461538461542" y="80" width="29.23076923076923" height="20" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="246.15384615384616" y="60" width="29.23076923076923" height="40" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="276.9230769230769" y="50" width="29.23076923076923" height="50" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="307.69230769230774" y="30" width="29.23076923076923" height="70" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="338.4615384615385" y="60" width="29.23076923076923" height="40" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="369.2307692307692" y="30" width="29.23076923076923" height="70" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                        </svg></div>
                                </div><!-- d-flex -->
                            </div>
                            <div class="carousel-item active">
                                <div class="bg-white ht-300 pos-relative overflow-hidden d-flex flex-column align-items-start rounded">
                                    <div class="pos-absolute t-15 r-25">
                                        <a href="" class="tx-gray-500 hover-info mg-l-7"><i class="icon ion-more tx-20"></i></a>
                                    </div>
                                    <div class="pd-x-30 pd-t-30 mg-b-auto">
                                        <p class="tx-info tx-uppercase tx-11 tx-semibold tx-mont mg-b-5">Product Item #2</p>
                                        <h5 class="tx-inverse mg-b-20">Apple iPhone 8 Plus</h5>
                                        <p class="tx-uppercase tx-11 tx-semibold tx-mont mg-b-0">Purchases</p>
                                        <h2 class="tx-inverse tx-lato tx-bold mg-b-0">5632</h2>
                                        <span>120.44 purchases/month</span>
                                    </div>
                                    <div id="ch11" class="ht-100 tr-y-1 rickshaw_graph"><svg width="400" height="100">
                                            <rect x="0" y="30" width="29.23076923076923" height="70" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="30.76923076923077" y="2" width="29.23076923076923" height="98" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="61.53846153846154" y="24" width="29.23076923076923" height="76" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="92.3076923076923" y="40" width="29.23076923076923" height="60" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="123.07692307692308" y="36" width="29.23076923076923" height="64" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="153.84615384615387" y="20" width="29.23076923076923" height="80" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="184.6153846153846" y="60" width="29.23076923076923" height="40" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="215.38461538461542" y="80" width="29.23076923076923" height="20" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="246.15384615384616" y="60" width="29.23076923076923" height="40" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="276.9230769230769" y="50" width="29.23076923076923" height="50" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="307.69230769230774" y="30" width="29.23076923076923" height="70" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="338.4615384615385" y="60" width="29.23076923076923" height="40" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                            <rect x="369.2307692307692" y="20" width="29.23076923076923" height="80" transform="matrix(1,0,0,1,0,0)" fill="#6F42C1"></rect>
                                        </svg></div>
                                </div><!-- d-flex -->
                            </div><!-- cardousel-item -->
                        </div><!-- carousel-inner -->
                    </div><!-- carousel -->
                </div><!-- card -->

                <div class="card card-body bd-0 pd-25 bg-primary mg-t-20">
                    <div class="d-xs-flex justify-content-between align-items-center tx-white mg-b-20">
                        <h6 class="tx-13 tx-uppercase tx-semibold tx-spacing-1 mg-b-0">Server Status</h6>
                        <span class="tx-12 tx-uppercase">Oct 2017</span>
                    </div>
                    <p class="tx-sm tx-white tx-medium mg-b-0">Hardware Monitoring</p>
                    <p class="tx-12 tx-white-7">Intel Dothraki G125H 2.5GHz</p>
                    <div class="progress bg-white-3 rounded-0 mg-b-0">
                        <div class="progress-bar bg-success wd-50p lh-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div><!-- progress -->
                    <p class="tx-11 mg-b-0 mg-t-15 tx-white-7">Notice: Lorem ipsum dolor sit amet.</p>
                </div><!-- card -->

                <div class="card bd-0 mg-t-20">
                    <div id="carousel12" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel12" data-slide-to="0" class=""></li>
                            <li data-target="#carousel12" data-slide-to="1" class="active"></li>
                            <li data-target="#carousel12" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item">
                                <div class="bg-br-primary pd-30 ht-300 pos-relative d-flex align-items-center rounded">
                                    <div class="pos-absolute t-20 r-20">
                                        <a href="" class="tx-white-5 hover-info"><i class="icon ion-edit tx-16"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-stats-bars tx-20"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-gear-a tx-20"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-more tx-20"></i></a>
                                    </div>
                                    <div class="tx-white">
                                        <p class="tx-uppercase tx-11 tx-semibold tx-mont tx-spacing-2 tx-white-5">Recent Article</p>
                                        <h5 class="lh-5 mg-b-20">20 Best Travel Tips After 5 Years Of Traveling The World</h5>
                                        <nav class="nav flex-row tx-13">
                                            <a href="" class="tx-white-8 hover-white pd-l-0 pd-r-5">12K+ Views</a>
                                            <a href="" class="tx-white-8 hover-white pd-x-5">234 Shares</a>
                                            <a href="" class="tx-white-8 hover-white pd-x-5">43 Comments</a>
                                        </nav>
                                    </div>
                                </div><!-- d-flex -->
                            </div>
                            <div class="carousel-item active">
                                <div class="bg-info pd-30 ht-300 pos-relative d-flex align-items-center rounded">
                                    <div class="pos-absolute t-20 r-20">
                                        <a href="" class="tx-white-5 hover-info"><i class="icon ion-edit tx-16"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-stats-bars tx-20"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-gear-a tx-20"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-more tx-20"></i></a>
                                    </div>
                                    <div class="tx-white">
                                        <p class="tx-uppercase tx-11 tx-semibold tx-mont tx-spacing-2 tx-white-5">Recent Article</p>
                                        <h5 class="lh-5 mg-b-20">How I Flew Around the World in Business Class for $1,340</h5>
                                        <nav class="nav flex-row tx-13">
                                            <a href="" class="tx-white-8 hover-white pd-l-0 pd-r-5">Edit</a>
                                            <a href="" class="tx-white-8 hover-white pd-x-5">Unpublish</a>
                                            <a href="" class="tx-white-8 hover-white pd-x-5">Delete</a>
                                        </nav>
                                    </div>
                                </div><!-- d-flex -->
                            </div>
                            <div class="carousel-item">
                                <div class="bg-purple pd-30 ht-300 d-flex pos-relative align-items-center rounded">
                                    <div class="pos-absolute t-20 r-20">
                                        <a href="" class="tx-white-5 hover-info"><i class="icon ion-edit tx-16"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-stats-bars tx-20"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-gear-a tx-20"></i></a>
                                        <a href="" class="tx-white-5 hover-info mg-l-7"><i class="icon ion-more tx-20"></i></a>
                                    </div>
                                    <div class="tx-white">
                                        <p class="tx-uppercase tx-11 tx-semibold tx-mont tx-spacing-2 tx-white-5">Recent Article</p>
                                        <h5 class="lh-5 mg-b-20">10 Reasons Why Travel Makes You a Happier Person</h5>
                                        <nav class="nav flex-row tx-13">
                                            <a href="" class="tx-white-8 hover-white pd-l-0 pd-r-5">Edit</a>
                                            <a href="" class="tx-white-8 hover-white pd-x-5">Unpublish</a>
                                            <a href="" class="tx-white-8 hover-white pd-x-5">Delete</a>
                                        </nav>
                                    </div>
                                </div><!-- d-flex -->
                            </div>
                        </div><!-- carousel-inner -->
                    </div><!-- carousel -->
                </div><!-- card -->

                <div class="card bg-danger bd-0 mg-t-20">
                    <div class="pd-x-25 pd-t-25">
                        <h6 class="tx-13 tx-uppercase tx-white tx-medium tx-spacing-1 mg-b-10">Monthly Statistics</h6>
                        <p class="mg-b-20 tx-white-6">Past 30 Days — Last Updated Oct 14, 2017</p>
                        <div class="row row-sm mg-t-20">
                            <div class="col">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold tx-white-6">Bounce Rate</p>
                                <h4 class="tx-lato tx-white tx-bold tx-normal mg-b-0">23.32%</h4>
                                <span class="tx-12 tx-white-6 tx-roboto">2.7% increased</span>
                            </div><!-- col -->
                            <div class="col">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold tx-white-6">Page Views</p>
                                <h4 class="tx-lato tx-white tx-normal mg-b-0">42.58%</h4>
                                <span class="tx-12 tx-white-6 tx-roboto">1.5% decreased</span>
                            </div><!-- col -->
                        </div><!-- row -->
                        <div id="ch13" class="ht-160 rickshaw_graph"><svg width="367" height="160">
                                <rect x="0" y="106.66666666666667" width="19.369444444444444" height="53.33333333333333" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="40.77777777777778" y="93.33333333333333" width="19.369444444444444" height="66.66666666666667" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="81.55555555555556" y="133.33333333333334" width="19.369444444444444" height="26.666666666666664" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="122.33333333333333" y="120" width="19.369444444444444" height="40" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="163.11111111111111" y="106.66666666666667" width="19.369444444444444" height="53.33333333333333" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="203.88888888888889" y="53.33333333333334" width="19.369444444444444" height="106.66666666666666" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="244.66666666666666" y="120" width="19.369444444444444" height="40" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="285.4444444444444" y="53.33333333333334" width="19.369444444444444" height="106.66666666666666" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="326.22222222222223" y="93.33333333333333" width="19.369444444444444" height="66.66666666666667" transform="matrix(1,0,0,1,0,0)" fill="#f25766"></rect>
                                <rect x="19.369444444444444" y="133.33333333333334" width="19.369444444444444" height="26.666666666666664" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="60.147222222222226" y="80" width="19.369444444444444" height="80" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="100.925" y="40" width="19.369444444444444" height="120" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="141.70277777777778" y="80" width="19.369444444444444" height="80" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="182.48055555555555" y="48" width="19.369444444444444" height="112" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="223.25833333333333" y="106.66666666666667" width="19.369444444444444" height="53.33333333333333" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="264.0361111111111" y="80" width="19.369444444444444" height="80" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="304.81388888888887" y="120" width="19.369444444444444" height="40" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                                <rect x="345.5916666666667" y="106.66666666666667" width="19.369444444444444" height="53.33333333333333" transform="matrix(1,0,0,1,0,0)" fill="#aa2531"></rect>
                            </svg></div>
                    </div><!-- pd-x-25 -->
                </div><!-- card -->

            </div><!-- col-4 -->
        </div><!-- row -->

    </div>
</div>
@endsection

@section("per_page_js")
<script src="{{ asset('backend/js/apexcharts/apexcharts.js') }}"></script>

<link href="{{ asset('backend/css/chosen/choosen.min.css') }}" rel="stylesheet">
<script src="{{ asset('backend/js/chosen/choosen.min.js') }}"></script>
<script>
    $(document).ready(function domReady() {
        $(".chosen").chosen();
    });
</script>

@endsection