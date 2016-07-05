﻿/* http://keith-wood.name/countdown.html
   English initialisation for the jQuery countdown extension
   Written by Dariush (b.g.dariush@gmail.com) Oct 2016.*/
(function($) {
	$.countdown.regionalOptions['en'] = {
		labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'],
		labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'],
		compactLabels: ['y', 'm', 'w', 'd'],
		whichLabels: null,
		digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
		timeSeparator: ':',
		isRTL: false
	};
	$.countdown.setDefaults($.countdown.regionalOptions['en']);
})(jQuery);
