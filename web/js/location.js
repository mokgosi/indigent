var Location = function () {

    return {

        initCharts: function () {

            if (!jQuery.plot) {
                return;
            }

            if ($('#placeholder').size() != 0) {

                var data = [];
                var i = 0;
                var colors = []
                var CSS_COLOR_NAMES = ["BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"];

                for (var prop in barData) {  //json data from twig template.
                    i++;
                    var data1 = barData[prop];
                    var color = CSS_COLOR_NAMES[i];
                    data.push({
                       label: prop,
                       data: data1,
                       bars: {
                           show: true,
                           barWidth: 12*24*60*60*300,
                           fill: true,
                           lineWidth: 1,
                           order: i,
                           fillColor:  color
                       },
                       color: color
                    });
                }

                $.plot($("#placeholder"), data, {
                    xaxis: {
                        min: (new Date(2015, 01, 15)).getTime(),
                        max: (new Date(2015, 12, 18)).getTime(),
                        mode: "time",
                        timeformat: "%b",
                        tickSize: [1, "month"],
                        monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        tickLength: 0, // hide gridlines
                        axisLabel: 'Month',
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                        axisLabelPadding: 5
                    },
                    yaxis: {
                        axisLabel: 'Value',
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                        axisLabelPadding: 5
                    },
                    grid: {
                        hoverable: true,
                        borderWidth: 1
                    },
                    legend: {
                        labelBoxBorderColor: "none",
                    },
                    series: {
                        shadowSize: 1
                    }
                });

                $("<div id='tooltip'></div>").css({
                    position: "absolute",
                    display: "none",
                    //top: y - 40,
                    //left: x - 120,
                    border: "1px solid #fdd",
                    'font-size': '9px',
                    padding: "2px",
                    "background-color": "#fee",
                    opacity: 0.80
                }).appendTo("body");

                $("#placeholder").bind("plothover", function (event, pos, item) {

                    if (item) {
                        var x = getMonthName(item.datapoint[0]),
                            y = item.datapoint[1];

                        $("#tooltip").html("<strong>" + item.series.label + "</strong><br>" + x + " = " + y)
                            .css({top: item.pageY+5, left: item.pageX+5})
                            .fadeIn(200);
                    } else {
                        $("#tooltip").hide();
                    }

                });
            }

            if ($('#site_activities').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();

                $.plot("#site_activities", [barData], {
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
        }
    }

    function getMonthName(newTimestamp) {
        var d = new Date(newTimestamp);

        var numericMonth = d.getMonth();
        var monthArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var alphaMonth = monthArray[numericMonth];

        return alphaMonth;
    }


    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
}();