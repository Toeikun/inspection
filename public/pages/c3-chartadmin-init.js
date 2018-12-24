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
        //Business
            var business_m1 = $('#business_m1').val();
            var business_m2 = $('#business_m2').val();
            var business_m3 = $('#business_m3').val();
            var business_m4 = $('#business_m4').val();
            var business_m5 = $('#business_m5').val();
            var business_m6 = $('#business_m6').val();
            var business_m7 = $('#business_m7').val();
            var business_m8 = $('#business_m8').val();
            var business_m9 = $('#business_m9').val();
            var business_m10 = $('#business_m10').val();
            var business_m11 = $('#business_m11').val();
            var business_m12 = $('#business_m12').val();

        //Store
            var store_m1 = $('#store_m1').val();
            var store_m2 = $('#store_m2').val();
            var store_m3 = $('#store_m3').val();
            var store_m4 = $('#store_m4').val();
            var store_m5 = $('#store_m5').val();
            var store_m6 = $('#store_m6').val();
            var store_m7 = $('#store_m7').val();
            var store_m8 = $('#store_m8').val();
            var store_m9 = $('#store_m9').val();
            var store_m10 = $('#store_m10').val();
            var store_m11 = $('#store_m11').val();
            var store_m12 = $('#store_m12').val();

        //Member
            var member_m1 = $('#member_m1').val();
            var member_m2 = $('#member_m2').val();
            var member_m3 = $('#member_m3').val();
            var member_m4 = $('#member_m4').val();
            var member_m5 = $('#member_m5').val();
            var member_m6 = $('#member_m6').val();
            var member_m7 = $('#member_m7').val();
            var member_m8 = $('#member_m8').val();
            var member_m9 = $('#member_m9').val();
            var member_m10 = $('#member_m10').val();
            var member_m11 = $('#member_m11').val();
            var member_m12 = $('#member_m12').val();

        //Event
            var event_m1 = $('#event_m1').val();
            var event_m2 = $('#event_m2').val();
            var event_m3 = $('#event_m3').val();
            var event_m4 = $('#event_m4').val();
            var event_m5 = $('#event_m5').val();
            var event_m6 = $('#event_m6').val();
            var event_m7 = $('#event_m7').val();
            var event_m8 = $('#event_m8').val();
            var event_m9 = $('#event_m9').val();
            var event_m10 = $('#event_m10').val();
            var event_m11 = $('#event_m11').val();
            var event_m12 = $('#event_m12').val();

        //Coupon
            var coupon_m1 = $('#coupon_m1').val();
            var coupon_m2 = $('#coupon_m2').val();
            var coupon_m3 = $('#coupon_m3').val();
            var coupon_m4 = $('#coupon_m4').val();
            var coupon_m5 = $('#coupon_m5').val();
            var coupon_m6 = $('#coupon_m6').val();
            var coupon_m7 = $('#coupon_m7').val();
            var coupon_m8 = $('#coupon_m8').val();
            var coupon_m9 = $('#coupon_m9').val();
            var coupon_m10 = $('#coupon_m10').val();
            var coupon_m11 = $('#coupon_m11').val();
            var coupon_m12 = $('#coupon_m12').val();

        //Transport
            var transport_m1 = $('#transport_m1').val();
            var transport_m2 = $('#transport_m2').val();
            var transport_m3 = $('#transport_m3').val();
            var transport_m4 = $('#transport_m4').val();
            var transport_m5 = $('#transport_m5').val();
            var transport_m6 = $('#transport_m6').val();
            var transport_m7 = $('#transport_m7').val();
            var transport_m8 = $('#transport_m8').val();
            var transport_m9 = $('#transport_m9').val();
            var transport_m10 = $('#transport_m10').val();
            var transport_m11 = $('#transport_m11').val();
            var transport_m12 = $('#transport_m12').val();

    // Commission chart
        var commission_m1 = $('#commission_m1').val(); 
        var commission_m2 = $('#commission_m2').val(); 
        var commission_m3 = $('#commission_m3').val(); 
        var commission_m4 = $('#commission_m4').val(); 
        var commission_m5 = $('#commission_m5').val(); 
        var commission_m6 = $('#commission_m6').val(); 
        var commission_m7 = $('#commission_m7').val(); 
        var commission_m8 = $('#commission_m8').val(); 
        var commission_m9 = $('#commission_m9').val(); 
        var commission_m10 = $('#commission_m10').val(); 
        var commission_m11 = $('#commission_m11').val(); 
        var commission_m12 = $('#commission_m12').val(); 

    //User Partner Chart 
        //User
            var user_m1 = $('#user_m1').val();
            var user_m2 = $('#user_m2').val();
            var user_m3 = $('#user_m3').val();
            var user_m4 = $('#user_m4').val();
            var user_m5 = $('#user_m5').val();
            var user_m6 = $('#user_m6').val();
            var user_m7 = $('#user_m7').val();
            var user_m8 = $('#user_m8').val();
            var user_m9 = $('#user_m9').val();
            var user_m10 = $('#user_m10').val();
            var user_m11 = $('#user_m11').val();
            var user_m12 = $('#user_m12').val();

        //Partner
            var partner_m1 = $('#partner_m1').val();
            var partner_m2 = $('#partner_m2').val();
            var partner_m3 = $('#partner_m3').val();
            var partner_m4 = $('#partner_m4').val();
            var partner_m5 = $('#partner_m5').val();
            var partner_m6 = $('#partner_m6').val();
            var partner_m7 = $('#partner_m7').val();
            var partner_m8 = $('#partner_m8').val();
            var partner_m9 = $('#partner_m9').val();
            var partner_m10 = $('#partner_m10').val();
            var partner_m11 = $('#partner_m11').val();
            var partner_m12 = $('#partner_m12').val();

    //User & Partner Pie Chart
        var user_all    = $('#user_all').val();
        var partner_all = $('#partner_all').val();
        
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
        //generating chart 
        c3.generate({
            bindto: '#chart',
            data: {
                columns: [
                    ['Business', business_m1, business_m2, business_m3, business_m4, business_m5, business_m6, business_m7, business_m8, business_m9, business_m10, business_m11, business_m12],
                    ['Store', store_m1, store_m2, store_m3, store_m4, store_m5, store_m6, store_m7, store_m8, store_m9, store_m10, store_m11, store_m12],
                    ['Member', member_m1, member_m2, member_m3, member_m4, member_m5, member_m6, member_m7, member_m8, member_m9, member_m10, member_m11, member_m12],
                    ['Event', event_m1, event_m2, event_m3, event_m4, event_m5, event_m6, event_m7, event_m8, event_m9, event_m10, event_m11, event_m12],
                    ['Coupon', coupon_m1, coupon_m2, coupon_m3, coupon_m4, coupon_m5, coupon_m6, coupon_m7, coupon_m8, coupon_m9, coupon_m10, coupon_m11, coupon_m12],
                    ['Transport', transport_m1, transport_m2, transport_m3, transport_m4, transport_m5, transport_m6, transport_m7, transport_m8, transport_m9, transport_m10, transport_m11, transport_m12]
                ],
                types: {
                    Business: 'bar',
                    Store: 'bar',
                    Member: 'bar',
                    Event: 'line',
                    Coupon: 'bar',
                    Transport: 'spline'
                },
                colors: {
                    Business: '#5ab8d8',
                    Store: '#1e81a2',
                    Member: '#68d9ff',
                    Event: '#07bcf9',
                    Coupon: '#9fdef3',
                    Transport: '#0296c7'
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
            bindto: '#payment-chart',
            data: {
                columns: [
                    ['Bank_Transfer', 30, 20, 50, 40, 60, 50, 200, 130, 90, 240, 130, 220],
                    ['Credit_Card', 200, 130, 90, 240, 130, 220,300, 200, 160, 400, 250, 250]
                ],
                types: {
                    Bank_Transfer: 'bar',
                    Credit_Card: 'bar'
                },
                colors: {
                    Bank_Transfer: '#0296c7',
                    Credit_Card: '#9fdef3'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        c3.generate({
            bindto: '#user-detail-chart',
            data: {
                columns: [
                    ['Added', 150, 80, 70, 152, 250, 95, 99, 120, 230, 300, 50, 210],
                    ['Released', 200, 130, 90, 240, 130, 220, 210, 50, 320, 220, 130, 220],
                    ['Deleted', 300, 200, 160, 400, 250, 250, 240, 200, 300, 100, 120, 100]
                ],
                type: 'bar',
                colors: {
                    Added: '#0296c7',
                    Released: '#9fdef3',
                    Deleted: '#07bcf9'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        c3.generate({
            bindto: '#user-detail-pie-chart',
            data: {
                columns: [
                    ['Added', 78],
                    ['Released', 55],
                    ['Deleted', 40]
                ],
                type : 'pie'
            },
            color: {
                pattern: ["#0296c7", "#9fdef3","#07bcf9"]
            },
            pie: {  
                label: {
                    show: false
                }
            }
        });

        // provider chart
        c3.generate({
            bindto: '#social-user-chart',
            data: {
                columns: [
                    ['Facebook', chartproviderfacebook_m1, chartproviderfacebook_m2, chartproviderfacebook_m3, chartproviderfacebook_m4, chartproviderfacebook_m5, chartproviderfacebook_m6, chartproviderfacebook_m7, chartproviderfacebook_m8, chartproviderfacebook_m9, chartproviderfacebook_m10, chartproviderfacebook_m11, chartproviderfacebook_m12],
                    ['Google', chartprovidergoogle_m1, chartprovidergoogle_m2, chartprovidergoogle_m3, chartprovidergoogle_m4, chartprovidergoogle_m5, chartprovidergoogle_m6, chartprovidergoogle_m7, chartprovidergoogle_m8, chartprovidergoogle_m9, chartprovidergoogle_m10, chartprovidergoogle_m11, chartprovidergoogle_m12],
                    ['Passinwallet', chartproviderpassinwallet_m1, chartproviderpassinwallet_m2, chartproviderpassinwallet_m3, chartproviderpassinwallet_m4, chartproviderpassinwallet_m5, chartproviderpassinwallet_m6, chartproviderpassinwallet_m7, chartproviderpassinwallet_m8, chartproviderpassinwallet_m9, chartproviderpassinwallet_m10, chartproviderpassinwallet_m11, chartproviderpassinwallet_m12]
                ],
                types: {
                    Facebook: 'bar',
                    Google: 'bar',
                    Passinwallet: 'bar'
                },
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

        

        c3.generate({
            bindto: '#commission-chart',
            data: {
                columns: [
                    ['Commission', commission_m1, commission_m2, commission_m3, commission_m4, commission_m5, commission_m6, commission_m7, commission_m8, commission_m9, commission_m10, commission_m11, commission_m12]
                ],
                types: {
                    Commission: 'spline'
                },
                colors: {
                    Commission: '#07bcf9'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        c3.generate({
            bindto: '#user-partner-chart',
            data: {
                columns: [
                    ['User', user_m1, user_m2, user_m3, user_m4, user_m5, user_m6,user_m7, user_m8, user_m9, user_m10, user_m11, user_m12],
                    ['Partner', partner_m1, partner_m2, partner_m3, partner_m4, partner_m5, partner_m6, partner_m7, partner_m8, partner_m9, partner_m10, partner_m11, partner_m12]
                ],
                types: {
                    User: 'spline',
                    Partner: 'spline'
                },
                colors: {
                    User: '#07bcf9',
                    Partner: '#0296c7'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        c3.generate({
            bindto: '#user-chart',
            data: {
                columns: [
                    ['User', user_m1, user_m2, user_m3, user_m4, user_m5, user_m6,user_m7, user_m8, user_m9, user_m10, user_m11, user_m12]
                    
                ],
                types: {
                    User: 'line'
                },
                colors: {
                    User: '#07bcf9'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }
            }
        });

        c3.generate({
            bindto: '#partner-chart',
            data: {
                columns: [
                    ['Partner', partner_m1, partner_m2, partner_m3, partner_m4, partner_m5, partner_m6, partner_m7, partner_m8, partner_m9, partner_m10, partner_m11, partner_m12]
                ],
                types: {
                    Partner: 'line'
                },
                colors: {
                    Partner: '#0296c7'
                }
            },
            axis: {
                x: {
                    type: 'category',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
                    ['Revenue', 130, 120, 150, 140, 160, 150, 130, 120, 150, 140, 160, 150],
                    ['Pageview', 200, 130, 90, 240, 130, 220, 200, 130, 90, 240, 130, 220]
                ],
                types: {
                    Revenue: 'area-spline',
                    Pageview: 'area-spline'
                    // 'line', 'spline', 'step', 'area', 'area-step' are also available to stack
                },
                colors: {
                    Revenue: '#dddddd',
                    Pageview: '#67a8e4'
                }
            }
        });
        
        //Donut Chart
        c3.generate({
             bindto: '#donut-chart',
            data: {
                columns: [
                    ['User', 68],
                    ['Partner', 55]
                ],
                type : 'donut'
            },
            donut: {
                title: "User & Partner",
                width: 30,
				label: { 
					show:false
				}
            },
            color: {
            	pattern: ["#07bcf9", "#0296c7"]
            }
        });

        //provider precent
        c3.generate({
            bindto: '#social-donut-chart',
            data: {
                columns: [
                    ['Facebook', facebook],
                    ['Google', google],
                    ['Passinwallet', passinwallet]
                ],
                type : 'donut'
            },
            donut: {
                title: "Provider",
                width: 30,
				label: { 
					show:false
				}
            },
            color: {
            	pattern: ["#3b5998", "#db3236","#08bdfa"]
            }
        });

        c3.generate({
             bindto: '#payment-type-donut-chart',
            data: {
                columns: [
                    ['Bank_Transfer', 80],
                    ['Credit_Card', 20]
                ],
                type : 'donut'
            },
            donut: {
                title: "Payment Method",
                width: 30,
				label: { 
					show:false
				}
            },
            color: {
            	pattern: ["#07bcf9", "#0296c7"]
            }
        });
        
        //Pie Chart
        c3.generate({
            bindto: '#pie-chart',
            data: {
                columns: [
                    ['User', user_all],
                    ['Partner', partner_all]
                ],
                type : 'pie'
            },
            color: {
                pattern: ["#07bcf9", "#0296c7"]
            },
            pie: {
		        label: {
		          show: false
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



