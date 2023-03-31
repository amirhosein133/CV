<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <!--begin::Mixed Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body p-0">
                <!--begin::Header-->
                <div class="px-9 pt-7 card-rounded h-275px w-100 bg-danger">
                    <!--begin::Balance-->
                    <div class="d-flex text-center flex-column text-white pt-8">
                        <span class="fw-bold fs-7">تعداد کاربران</span>
                        <span class="fw-bolder fs-2x pt-1">{{count($users)}}</span>
                    </div>
                    <!--end::Balance-->
                </div>
                <!--end::Header-->
                <!--begin::Items-->
                <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1"
                     style="margin-top: -100px">
                    <div class="flex-grow-1">
                        <div class="mixed-widget-4-chart" data-kt-chart-color="primary"
                             style="height: 200px; min-height: 178.7px;">
                            <div id="apexcharts0jzyu5ic"
                                 class="apexcharts-canvas apexcharts0jzyu5ic apexcharts-theme-light"
                                 style="width: 266px; height: 178.7px;">
                                <svg id="SvgjsSvg1327" width="266" height="178.7"
                                     xmlns="http://www.w3.org/2000/svg" version="1.1"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                     class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                     transform="translate(0, 0)" style="background: transparent; padding-left: 14px !important;">
                                    <g id="SvgjsG1329" class="apexcharts-inner apexcharts-graphical"
                                       transform="translate(46, 0)">
                                        <defs id="SvgjsDefs1328">
                                            <clipPath id="gridRectMask0jzyu5ic">
                                                <rect id="SvgjsRect1331" width="182" height="200" x="-3" y="-1"
                                                      rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMask0jzyu5ic"></clipPath>
                                            <clipPath id="nonForecastMask0jzyu5ic"></clipPath>
                                            <clipPath id="gridRectMarkerMask0jzyu5ic">
                                                <rect id="SvgjsRect1332" width="180" height="202" x="-2" y="-2"
                                                      rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG1333" class="apexcharts-radialbar">
                                            <g id="SvgjsG1334">
                                                <g id="SvgjsG1335" class="apexcharts-tracks">
                                                    <g id="SvgjsG1336"
                                                       class="apexcharts-radialbar-track apexcharts-track"
                                                       rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                              d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023"
                                                              fill="none" fill-opacity="1"
                                                              stroke="rgba(241,250,255,0.85)" stroke-opacity="1"
                                                              stroke-linecap="round"
                                                              stroke-width="8.97439024390244"
                                                              stroke-dasharray="0"
                                                              class="apexcharts-radialbar-area"
                                                              data:pathorig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023"></path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1338">
                                                    <g id="SvgjsG1342"
                                                       class="apexcharts-series apexcharts-radial-series"
                                                       seriesname="Progress" rel="1" data:realindex="0">
                                                        <path id="SvgjsPath1343"
                                                              d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158"
                                                              fill="none" fill-opacity="0.85"
                                                              stroke="rgba(0,158,247,0.85)" stroke-opacity="1"
                                                              stroke-linecap="round"
                                                              stroke-width="8.97439024390244"
                                                              stroke-dasharray="0"
                                                              class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                              data:angle="266" data:value="74" index="0" j="0"
                                                              data:pathorig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158"></path>
                                                    </g>
                                                    <circle id="SvgjsCircle1339" r="56.9048780487805" cx="88"
                                                            cy="88" class="apexcharts-radialbar-hollow"
                                                            fill="transparent"></circle>
                                                    <g id="SvgjsG1340" class="apexcharts-datalabels-group"
                                                       transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                        <text id="SvgjsText1341" font-family="inherit" x="88"
                                                              y="100" text-anchor="middle"
                                                              dominant-baseline="auto" font-size="30px"
                                                              font-weight="700" fill="#5e6278"
                                                              class="apexcharts-text apexcharts-datalabel-value"
                                                              style="font-family: inherit;">{{(count($users)/100)*100}}%
                                                        </text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1344" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6"
                                              stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1345" x1="0" y1="0" x2="176" y2="0"
                                              stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG1330" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 1-->
    </div>
    <div class="col-xl-4">
        <!--begin::Mixed Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body p-0">
                <!--begin::Header-->
                <div class="px-9 pt-7 card-rounded h-275px w-100 bg-secondary">
                    <!--begin::Balance-->
                    <div class="d-flex text-center flex-column text-white pt-8">
                        <span class="fw-bold fs-7">تعداد کاربران دارای مقام</span>
                        @php
                            $user = new \App\Models\User();
                        @endphp
                        <span class="fw-bolder fs-2x pt-1">{{count($user->has('roles')->get())}}</span>
                    </div>
                    <!--end::Balance-->
                </div>
                <!--end::Header-->
                <!--begin::Items-->
                <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1"
                     style="margin-top: -100px">
                    <div class="flex-grow-1">
                        <div class="mixed-widget-4-chart" data-kt-chart-color="primary"
                             style="height: 200px; min-height: 178.7px;">
                            <div id="apexcharts0jzyu5ic"
                                 class="apexcharts-canvas apexcharts0jzyu5ic apexcharts-theme-light"
                                 style="width: 266px; height: 178.7px;">
                                <svg id="SvgjsSvg1327" width="266" height="178.7"
                                     xmlns="http://www.w3.org/2000/svg" version="1.1"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                     class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                     transform="translate(0, 0)" style="background: transparent; padding-left: 14px !important;">
                                    <g id="SvgjsG1329" class="apexcharts-inner apexcharts-graphical"
                                       transform="translate(46, 0)">
                                        <defs id="SvgjsDefs1328">
                                            <clipPath id="gridRectMask0jzyu5ic">
                                                <rect id="SvgjsRect1331" width="182" height="200" x="-3" y="-1"
                                                      rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMask0jzyu5ic"></clipPath>
                                            <clipPath id="nonForecastMask0jzyu5ic"></clipPath>
                                            <clipPath id="gridRectMarkerMask0jzyu5ic">
                                                <rect id="SvgjsRect1332" width="180" height="202" x="-2" y="-2"
                                                      rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG1333" class="apexcharts-radialbar">
                                            <g id="SvgjsG1334">
                                                <g id="SvgjsG1335" class="apexcharts-tracks">
                                                    <g id="SvgjsG1336"
                                                       class="apexcharts-radialbar-track apexcharts-track"
                                                       rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                              d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023"
                                                              fill="none" fill-opacity="1"
                                                              stroke="rgba(241,250,255,0.85)" stroke-opacity="1"
                                                              stroke-linecap="round"
                                                              stroke-width="8.97439024390244"
                                                              stroke-dasharray="0"
                                                              class="apexcharts-radialbar-area"
                                                              data:pathorig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023"></path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1338">
                                                    <g id="SvgjsG1342"
                                                       class="apexcharts-series apexcharts-radial-series"
                                                       seriesname="Progress" rel="1" data:realindex="0">
                                                        <path id="SvgjsPath1343"
                                                              d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158"
                                                              fill="none" fill-opacity="0.85"
                                                              stroke="rgba(0,158,247,0.85)" stroke-opacity="1"
                                                              stroke-linecap="round"
                                                              stroke-width="8.97439024390244"
                                                              stroke-dasharray="0"
                                                              class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                              data:angle="266" data:value="74" index="0" j="0"
                                                              data:pathorig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158"></path>
                                                    </g>
                                                    <circle id="SvgjsCircle1339" r="56.9048780487805" cx="88"
                                                            cy="88" class="apexcharts-radialbar-hollow"
                                                            fill="transparent"></circle>
                                                    <g id="SvgjsG1340" class="apexcharts-datalabels-group"
                                                       transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                        <text id="SvgjsText1341" font-family="inherit" x="88"
                                                              y="100" text-anchor="middle"
                                                              dominant-baseline="auto" font-size="30px"
                                                              font-weight="700" fill="#5e6278"
                                                              class="apexcharts-text apexcharts-datalabel-value"
                                                              style="font-family: inherit;">{{(count($user->has('roles')->get()) /100)*100}}%
                                                        </text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1344" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6"
                                              stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1345" x1="0" y1="0" x2="176" y2="0"
                                              stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG1330" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 1-->
    </div>
    <!--end::Col-->
    <div class="col-xl-4">
        <!--begin::Mixed Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body p-0">
                <!--begin::Header-->
                <div class="px-9 pt-7 card-rounded h-275px w-100 bg-success">
                    <!--begin::Balance-->
                    <div class="d-flex text-center flex-column text-white pt-8">
                        <span class="fw-bold fs-7">تعداد مقاله های منتشر شده</span>
                        <span class="fw-bolder fs-2x pt-1">{{count(\App\Models\Article::all())}}</span>
                    </div>
                    <!--end::Balance-->
                </div>
                <!--end::Header-->
                <!--begin::Items-->
                <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1"
                     style="margin-top: -100px">
                    <div class="flex-grow-1">
                        <div class="mixed-widget-4-chart" data-kt-chart-color="primary"
                             style="height: 200px; min-height: 178.7px;">
                            <div id="apexcharts0jzyu5ic"
                                 class="apexcharts-canvas apexcharts0jzyu5ic apexcharts-theme-light"
                                 style="width: 266px; height: 178.7px;">
                                <svg id="SvgjsSvg1327" width="266" height="178.7"
                                     xmlns="http://www.w3.org/2000/svg" version="1.1"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                     class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                     transform="translate(0, 0)" style="background: transparent; padding-left: 14px !important;">
                                    <g id="SvgjsG1329" class="apexcharts-inner apexcharts-graphical"
                                       transform="translate(46, 0)">
                                        <defs id="SvgjsDefs1328">
                                            <clipPath id="gridRectMask0jzyu5ic">
                                                <rect id="SvgjsRect1331" width="182" height="200" x="-3" y="-1"
                                                      rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMask0jzyu5ic"></clipPath>
                                            <clipPath id="nonForecastMask0jzyu5ic"></clipPath>
                                            <clipPath id="gridRectMarkerMask0jzyu5ic">
                                                <rect id="SvgjsRect1332" width="180" height="202" x="-2" y="-2"
                                                      rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                      stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG1333" class="apexcharts-radialbar">
                                            <g id="SvgjsG1334">
                                                <g id="SvgjsG1335" class="apexcharts-tracks">
                                                    <g id="SvgjsG1336"
                                                       class="apexcharts-radialbar-track apexcharts-track"
                                                       rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                              d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023"
                                                              fill="none" fill-opacity="1"
                                                              stroke="rgba(241,250,255,0.85)" stroke-opacity="1"
                                                              stroke-linecap="round"
                                                              stroke-width="8.97439024390244"
                                                              stroke-dasharray="0"
                                                              class="apexcharts-radialbar-area"
                                                              data:pathorig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 87.98928506193984 26.607927764323023"></path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1338">
                                                    <g id="SvgjsG1342"
                                                       class="apexcharts-series apexcharts-radial-series"
                                                       seriesname="Progress" rel="1" data:realindex="0">
                                                        <path id="SvgjsPath1343"
                                                              d="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158"
                                                              fill="none" fill-opacity="0.85"
                                                              stroke="rgba(0,158,247,0.85)" stroke-opacity="1"
                                                              stroke-linecap="round"
                                                              stroke-width="8.97439024390244"
                                                              stroke-dasharray="0"
                                                              class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                              data:angle="266" data:value="74" index="0" j="0"
                                                              data:pathorig="M 88 26.60792682926828 A 61.39207317073172 61.39207317073172 0 1 1 26.757474833957374 92.28249454023158"></path>
                                                    </g>
                                                    <circle id="SvgjsCircle1339" r="56.9048780487805" cx="88"
                                                            cy="88" class="apexcharts-radialbar-hollow"
                                                            fill="transparent"></circle>
                                                    <g id="SvgjsG1340" class="apexcharts-datalabels-group"
                                                       transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                        <text id="SvgjsText1341" font-family="inherit" x="88"
                                                              y="100" text-anchor="middle"
                                                              dominant-baseline="auto" font-size="30px"
                                                              font-weight="700" fill="#5e6278"
                                                              class="apexcharts-text apexcharts-datalabel-value"
                                                              style="font-family: inherit;">{{count(\App\Models\Article::all())}}%
                                                        </text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1344" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6"
                                              stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1345" x1="0" y1="0" x2="176" y2="0"
                                              stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                              class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG1330" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 1-->
    </div>
</div>
