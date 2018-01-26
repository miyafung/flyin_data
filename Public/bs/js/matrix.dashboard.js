
$(document).ready(function(){
	
	

	
	// === Prepare the chart data ===/
	var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }



	// === Point hover in chart === //
    var previousPoint = null;
    $(".chart").bind("plothover", function (event, pos, item) {

        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                
                $('#tooltip').fadeOut(200,function(){
					$(this).remove();
				});
                var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
                    
                maruti.flot_tooltip(item.pageX, item.pageY,item.series.label + " of " + x + " = " + y);
            }
            
        } else {
			$('#tooltip').fadeOut(200,function(){
					$(this).remove();
				});
            previousPoint = null;           
        }   
    });	
    
	
	
	

});



