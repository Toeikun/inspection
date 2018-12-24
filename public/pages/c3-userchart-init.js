/*
 Template Name: Admiry - Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: C3 Chart init js
 */

!function($) {
    "use strict";

    var ChartC3 = function() {};

    //Pass chart
    //released
    var namecard_m1 = $('#namecard_m1').val();
    var namecard_m2 = $('#namecard_m2').val();
    var namecard_m3 = $('#namecard_m3').val();
    var namecard_m4 = $('#namecard_m4').val();
    var namecard_m5 = $('#namecard_m5').val();
    var namecard_m6 = $('#namecard_m6').val();
    var namecard_m7 = $('#namecard_m7').val();
    var namecard_m8 = $('#namecard_m8').val();
    var namecard_m9 = $('#namecard_m9').val();
    var namecard_m10 = $('#namecard_m10').val();
    var namecard_m11 = $('#namecard_m11').val();
    var namecard_m12 = $('#namecard_m12').val();

    //master
    var master_m1 = $('#master_m1').val();
    var master_m2 = $('#master_m2').val();
    var master_m3 = $('#master_m3').val();
    var master_m4 = $('#master_m4').val();
    var master_m5 = $('#master_m5').val();
    var master_m6 = $('#master_m6').val();
    var master_m7 = $('#master_m7').val();
    var master_m8 = $('#master_m8').val();
    var master_m9 = $('#master_m9').val();
    var master_m10 = $('#master_m10').val();
    var master_m11 = $('#master_m11').val();
    var master_m12 = $('#master_m12').val();

    //deleted
    var deleted_m1 = $('#deleted_m1').val();
    var deleted_m2 = $('#deleted_m2').val();
    var deleted_m3 = $('#deleted_m3').val();
    var deleted_m4 = $('#deleted_m4').val();
    var deleted_m5 = $('#deleted_m5').val();
    var deleted_m6 = $('#deleted_m6').val();
    var deleted_m7 = $('#deleted_m7').val();
    var deleted_m8 = $('#deleted_m8').val();
    var deleted_m9 = $('#deleted_m9').val();
    var deleted_m10 = $('#deleted_m10').val();
    var deleted_m11 = $('#deleted_m11').val();
    var deleted_m12 = $('#deleted_m12').val();

    ChartC3.prototype.init = function () {
        //generating chart
        c3.generate({
            bindto: '#chart',
            data: {
                columns: [
                    ['Master', master_m1, master_m2, master_m3, master_m4, master_m5, master_m6, master_m7, master_m8, master_m9, master_m10, master_m11, master_m12],
                    ['Namecard', namecard_m1, namecard_m2, namecard_m3, namecard_m4, namecard_m5, namecard_m6, namecard_m7, namecard_m8, namecard_m9, namecard_m10, namecard_m11, namecard_m12],
                    ['Deleted', deleted_m1, deleted_m2, deleted_m3, deleted_m4, deleted_m5, deleted_m6, deleted_m7, deleted_m8, deleted_m9, deleted_m10, deleted_m11, deleted_m12]
                ],
                type: 'bar',
                colors: {
                    Master: '#67a8e4',
                    Namecard: '#4ac18e',
                    Deleted: '#e54749'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        //combined chart
        c3.generate({
            bindto: '#combine-chart',
            data: {
                columns: [
                    ['SonyVaio', 30, 20, 50, 40, 60, 50],
                    ['iMacs', 200, 130, 90, 240, 130, 220],
                    ['Tablets', 300, 200, 160, 400, 250, 250],
                    ['iPhones', 200, 130, 90, 240, 130, 220],
                    ['Macbooks', 130, 120, 150, 140, 160, 150]
                ],
                types: {
                    SonyVaio: 'bar',
                    iMacs: 'bar',
                    Tablets: 'spline',
                    iPhones: 'line',
                    Macbooks: 'bar'
                },
                colors: {
                    SonyVaio: '#2683d8',
                    iMacs: '#519ce0',
                    Tablets: '#7db4e8',
                    iPhones: '#67a8e4',
                    Macbooks: '#a8cdf0'
                },
                groups: [
                    ['SonyVaio','iMacs']
                ]
            },
            axis: {
                x: {
                    type: 'categorized'
                }
            }
        });

        //roated chart
        c3.generate({
            bindto: '#roated-chart',
            data: {
                columns: [
                ['Revenue', 30, 200, 100, 400, 150, 250],
                ['Pageview', 50, 20, 10, 40, 15, 25]
                ],
                types: {
                    Revenue: 'bar'
                },
                colors: {
                    Revenue: '#67a8e4',
                    Pageview: '#2683d8'
	            }
            },
            axis: {
                rotated: true,
                x: {
                type: 'categorized'
                }
            }
        });

        //stacked chart
        c3.generate({
            bindto: '#chart-stacked',
            data: {
                columns: [
                    ['Master', master_m1, master_m2, master_m3, master_m4, master_m5, master_m6, master_m7, master_m8, master_m9, master_m10, master_m11, master_m12],
                    ['Namecard', namecard_m1, namecard_m2, namecard_m3, namecard_m4, namecard_m5, namecard_m6, namecard_m7, namecard_m8, namecard_m9, namecard_m10, namecard_m11, namecard_m12],
                    ['Deleted', deleted_m1, deleted_m2, deleted_m3, deleted_m4, deleted_m5, deleted_m6, deleted_m7, deleted_m8, deleted_m9, deleted_m10, deleted_m11, deleted_m12]
                ],
                types: {
                    Master: 'spline',
                    Namecard: 'spline',
                    Deleted: 'spline'
                    // 'line', 'spline', 'step', 'area', 'area-step' are also available to stack
                },
                colors: {
                    Master: '#67a8e4',
                    Namecard: '#4ac18e',
                    Deleted: '#e54749'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        //Donut Chart
        c3.generate({
             bindto: '#donut-chart',
            data: {
                columns: [
                    ['Desktops', 78],
                    ['Smart Phones', 55],
                    ['Mobiles', 40],
                    ['Tablets', 25]
                ],
                type : 'donut'
            },
            donut: {
                title: "Candidates",
                width: 30,
				label: {
					show:false
				}
            },
            color: {
            	pattern: ["#2683d8", "#ebeff2","#a8cdf0","#67a8e4"]
            }
        });

        //Pie Chart
        //   c3.generate({
        //        bindto: '#pie-chart',
        //       data: {
        //           columns: [
        //               ['Released', namecard],
        //               ['Added', master],
        //               ['Deleted', deleted]
        //           ],
        //           type : 'pie'
        //       },
        //       color: {
        //           pattern: ["#2683d8", "#a8cdf0","#67a8e4"]
        //       },
        //       pie: {
  		//         label: {
  		//           show: false
  		//         }
  		//     }
        // });

    },
    $.ChartC3 = new ChartC3, $.ChartC3.Constructor = ChartC3

}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.ChartC3.init()
}(window.jQuery);
