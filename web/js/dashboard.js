var Dashboard = function () {
    return {
initCharts: function () {


            if (!jQuery.plot) {
                return;
            }

            if ($('#site_activities').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();

                $.plot("#site_activities", [barGraphData], {
                    series: {
                        color: "rgba(107,207,123, 0.9)",
                        shadowSize: 0,
                        bars: {
                            show: true,
                            lineWidth: 0,
                            fill: true,
                            fillColor: {
                                colors: [{
                                        opacity: 1
                                    }, {
                                        opacity: 1
                                    }
                                ]
                            },
                            barWidth: 0.6,
                            align: "center"
                        }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
                    }
                });
            }

            if ($('#site_statistics').size() != 0) {

                //site activities
                var previousPoint2 = null;

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                $.plot('#site_statistics', pieGraphData, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 3 / 4,
                                formatter: labelFormatter,
                                background: {
//                                    opacity: 0.5
                                }
                            }
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                });
            }

            function labelFormatter(label, series) {
                return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
            }
        }
    };

}();        