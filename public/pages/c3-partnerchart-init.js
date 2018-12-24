/*
 Template Name: Admiry - Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: C3 Chart init js
 */

!function($) {
    "use strict";

    var ChartC3 = function() {};

    //กราฟแสดงจำนวนลูกค้า
    var chartallcustomer_m1 = $('#chartallcustomer_m1').val();
    var chartallcustomer_m2 = $('#chartallcustomer_m2').val();
    var chartallcustomer_m3 = $('#chartallcustomer_m3').val();
    var chartallcustomer_m4 = $('#chartallcustomer_m4').val();
    var chartallcustomer_m5 = $('#chartallcustomer_m5').val();
    var chartallcustomer_m6 = $('#chartallcustomer_m6').val();
    var chartallcustomer_m7 = $('#chartallcustomer_m7').val();
    var chartallcustomer_m8 = $('#chartallcustomer_m8').val();
    var chartallcustomer_m9 = $('#chartallcustomer_m9').val();
    var chartallcustomer_m10 = $('#chartallcustomer_m10').val();
    var chartallcustomer_m11 = $('#chartallcustomer_m11').val();
    var chartallcustomer_m12 = $('#chartallcustomer_m12').val();

    var chartpackmonthcustomer_m1 = $('#chartpackmonthcustomer_m1').val();
    var chartpackmonthcustomer_m2 = $('#chartpackmonthcustomer_m2').val();
    var chartpackmonthcustomer_m3 = $('#chartpackmonthcustomer_m3').val();
    var chartpackmonthcustomer_m4 = $('#chartpackmonthcustomer_m4').val();
    var chartpackmonthcustomer_m5 = $('#chartpackmonthcustomer_m5').val();
    var chartpackmonthcustomer_m6 = $('#chartpackmonthcustomer_m6').val();
    var chartpackmonthcustomer_m7 = $('#chartpackmonthcustomer_m7').val();
    var chartpackmonthcustomer_m8 = $('#chartpackmonthcustomer_m8').val();
    var chartpackmonthcustomer_m9 = $('#chartpackmonthcustomer_m9').val();
    var chartpackmonthcustomer_m10 = $('#chartpackmonthcustomer_m10').val();
    var chartpackmonthcustomer_m11 = $('#chartpackmonthcustomer_m11').val();
    var chartpackmonthcustomer_m12 = $('#chartpackmonthcustomer_m12').val();

    var chartpack100customer_m1 = $('#chartpack100customer_m1').val();
    var chartpack100customer_m2 = $('#chartpack100customer_m2').val();
    var chartpack100customer_m3 = $('#chartpack100customer_m3').val();
    var chartpack100customer_m4 = $('#chartpack100customer_m4').val();
    var chartpack100customer_m5 = $('#chartpack100customer_m5').val();
    var chartpack100customer_m6 = $('#chartpack100customer_m6').val();
    var chartpack100customer_m7 = $('#chartpack100customer_m7').val();
    var chartpack100customer_m8 = $('#chartpack100customer_m8').val();
    var chartpack100customer_m9 = $('#chartpack100customer_m9').val();
    var chartpack100customer_m10 = $('#chartpack100customer_m10').val();
    var chartpack100customer_m11 = $('#chartpack100customer_m11').val();
    var chartpack100customer_m12 = $('#chartpack100customer_m12').val();

    //กราฟแสดง provider 
    var passinwallet = $('#passinwallet').val();
    var google = $('#google').val();
    var facebook = $('#facebook').val();

    var chartproviderpassinwallet_m1 = $('#chartproviderpassinwallet_m1').val();
    var chartproviderpassinwallet_m2 = $('#chartproviderpassinwallet_m2').val();
    var chartproviderpassinwallet_m3 = $('#chartproviderpassinwallet_m3').val();
    var chartproviderpassinwallet_m4 = $('#chartproviderpassinwallet_m4').val();
    var chartproviderpassinwallet_m5 = $('#chartproviderpassinwallet_m5').val();
    var chartproviderpassinwallet_m6 = $('#chartproviderpassinwallet_m6').val();
    var chartproviderpassinwallet_m7 = $('#chartproviderpassinwallet_m7').val();
    var chartproviderpassinwallet_m8 = $('#chartproviderpassinwallet_m8').val();
    var chartproviderpassinwallet_m9 = $('#chartproviderpassinwallet_m9').val();
    var chartproviderpassinwallet_m10 = $('#chartproviderpassinwallet_m10').val();
    var chartproviderpassinwallet_m11 = $('#chartproviderpassinwallet_m11').val();
    var chartproviderpassinwallet_m12 = $('#chartproviderpassinwallet_m12').val();

    var chartprovidergoogle_m1 = $('#chartprovidergoogle_m1').val();
    var chartprovidergoogle_m2 = $('#chartprovidergoogle_m2').val();
    var chartprovidergoogle_m3 = $('#chartprovidergoogle_m3').val();
    var chartprovidergoogle_m4 = $('#chartprovidergoogle_m4').val();
    var chartprovidergoogle_m5 = $('#chartprovidergoogle_m5').val();
    var chartprovidergoogle_m6 = $('#chartprovidergoogle_m6').val();
    var chartprovidergoogle_m7 = $('#chartprovidergoogle_m7').val();
    var chartprovidergoogle_m8 = $('#chartprovidergoogle_m8').val();
    var chartprovidergoogle_m9 = $('#chartprovidergoogle_m9').val();
    var chartprovidergoogle_m10 = $('#chartprovidergoogle_m10').val();
    var chartprovidergoogle_m11 = $('#chartprovidergoogle_m11').val();
    var chartprovidergoogle_m12 = $('#chartprovidergoogle_m12').val();

    var chartproviderfacebook_m1 = $('#chartproviderfacebook_m1').val();
    var chartproviderfacebook_m2 = $('#chartproviderfacebook_m2').val();
    var chartproviderfacebook_m3 = $('#chartproviderfacebook_m3').val();
    var chartproviderfacebook_m4 = $('#chartproviderfacebook_m4').val();
    var chartproviderfacebook_m5 = $('#chartproviderfacebook_m5').val();
    var chartproviderfacebook_m6 = $('#chartproviderfacebook_m6').val();
    var chartproviderfacebook_m7 = $('#chartproviderfacebook_m7').val();
    var chartproviderfacebook_m8 = $('#chartproviderfacebook_m8').val();
    var chartproviderfacebook_m9 = $('#chartproviderfacebook_m9').val();
    var chartproviderfacebook_m10 = $('#chartproviderfacebook_m10').val();
    var chartproviderfacebook_m11 = $('#chartproviderfacebook_m11').val();
    var chartproviderfacebook_m12 = $('#chartproviderfacebook_m12').val();

    ChartC3.prototype.init = function () {
        // generating chart
        c3.generate({
            bindto: '#chart',
            data: {
                columns: [
                    ['Customer_PackMonth', chartpackmonthcustomer_m1, chartpackmonthcustomer_m2, chartpackmonthcustomer_m3, chartpackmonthcustomer_m4, chartpackmonthcustomer_m5, chartpackmonthcustomer_m6, chartpackmonthcustomer_m7, chartpackmonthcustomer_m8, chartpackmonthcustomer_m9, chartpackmonthcustomer_m10, chartpackmonthcustomer_m11, chartpackmonthcustomer_m12],
                    ['Customer_Pack100', chartpack100customer_m1, chartpack100customer_m2, chartpack100customer_m3, chartpack100customer_m4, chartpack100customer_m5, chartpack100customer_m6, chartpack100customer_m7, chartpack100customer_m8, chartpack100customer_m9, chartpack100customer_m10, chartpack100customer_m11, chartpack100customer_m12]
                ],
                type: 'bar',
                colors: {
                    Customer_PackMonth: '#2683d8',
                    Customer_Pack100: '#67a8e4'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        //provider chart
        c3.generate({
            bindto: '#chart-provider',
            data: {
                columns: [
                    ['Passinwallet', chartproviderpassinwallet_m1, chartproviderpassinwallet_m2, chartproviderpassinwallet_m3, chartproviderpassinwallet_m4, chartproviderpassinwallet_m5, chartproviderpassinwallet_m6, chartproviderpassinwallet_m7, chartproviderpassinwallet_m8, chartproviderpassinwallet_m9, chartproviderpassinwallet_m10, chartproviderpassinwallet_m11, chartproviderpassinwallet_m12],
                    ['Google', chartprovidergoogle_m1, chartprovidergoogle_m2, chartprovidergoogle_m3, chartprovidergoogle_m4, chartprovidergoogle_m5, chartprovidergoogle_m6, chartprovidergoogle_m7, chartprovidergoogle_m8, chartprovidergoogle_m9, chartprovidergoogle_m10, chartprovidergoogle_m11, chartprovidergoogle_m12],
                    ['Facebook', chartproviderfacebook_m1, chartproviderfacebook_m2, chartproviderfacebook_m3, chartproviderfacebook_m4, chartproviderfacebook_m5, chartproviderfacebook_m6, chartproviderfacebook_m7, chartproviderfacebook_m8, chartproviderfacebook_m9, chartproviderfacebook_m10, chartproviderfacebook_m11, chartproviderfacebook_m12]
                ],
                type: 'bar',
                colors: {
                    Facebook: '#3b5998',
                    Google: '#db3236',
                    Passinwallet: '#08bdfa'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        // chart commission
        c3.generate({
            bindto: '#chartcom',
            data: {
                columns: [
                    ['Commission', 130, 120, 150, 140, 160, 150, 130, 120, 150, 140, 160, 150]
                ],
                type: 'spline',
                colors: {
                    Desktop: '#2683d8'
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
                    ['Customer', chartallcustomer_m1, chartallcustomer_m2, chartallcustomer_m3, chartallcustomer_m4, chartallcustomer_m5, chartallcustomer_m6, chartallcustomer_m7, chartallcustomer_m8, chartallcustomer_m9, chartallcustomer_m10, chartallcustomer_m11, chartallcustomer_m12]
                ],
                types: {
                    Customer: 'area-spline'
                    // 'line', 'spline', 'step', 'area', 'area-step' are also available to stack
                },
                colors: {
                    Customer: '#67a8e4'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        //Customer stacked chart
        c3.generate({
            bindto: '#chart-stackedcom',
            data: {
                columns: [
                    ['Commission', 130, 120, 150, 140, 160, 150, 130, 120, 150, 140, 160, 150]
                ],
                types: {
                    Commission: 'bar'
                    // 'line', 'spline', 'step', 'area', 'area-step' are also available to stack
                },
                colors: {
                    Commission: '#67a8e4'
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
        c3.generate({
             bindto: '#pie-chart',
            data: {
                columns: [
                    ['Passinwallet', passinwallet],
                    ['Google', google],
                    ['Facebook', facebook]
                ],
                type : 'pie'
            },
            color: {
                pattern: ["#08bdfa", "#db3236","#3b5998"]
            },
            pie: {
		        label: {
		          show: true
		        }
		    }
        });

    },
    $.ChartC3 = new ChartC3, $.ChartC3.Constructor = ChartC3

}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.ChartC3.init()
}(window.jQuery);
