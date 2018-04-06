$(function(){
	$(".btn-short").click(function() {
    	var url = $(".url-original").val().trim();
    	if (url != "") {
	    	$(".outputurl").hide();
	    	$(".loading").html('<img src="'+asset_url+'img/loader.gif" width="200px">');

	    	$.ajax({
                url: adminurl+"link/add/ajax",
                crossDomain: true,
                dataType: 'json',
                type: "post",
                data: 'original_url='+url,
                success: function(data){
                    if (data.status == "success") {
                        var link_url = data.data.link;
                        var protomatch = /^(https?|ftp):\/\//; // NB: not '.*'
                        link_url = link_url.replace(protomatch, '');
                        var html = "<tr><td>"+data.data.original+"</td>";
                        html += "<td>"+data.data.date+"</td>";
                        html += "<td>"+link_url+"</td>";
                        html += "<td>0</td>";
                        html += '<td><span class="badge badge-success">Analytics Data</span></td></tr>';
                        $(".listshorturl").prepend(html);
                        $("#shorturl").val(data.data.link);
                        $(".url-original").val("");
                        $(".loading").html("");
                        $(".outputurl").show();
                    }
                    else {
                        $(".url-original").val("Failed, Please Retry Again !!!");
                        $(".loading").html("");
                        $(".outputurl").show();
                    }
                }
            });

    	} else {
    		$(".url-original").val("");
    	}
    	
  	});

    $(".url-original").keypress(function(e){
        if (e.keyCode == 13) {
            $(".btn-short").click();
        }
    });

    if ( $('#cat_fbgroup').length ) {
        var source_url = base_url + 'tools/ajax/getcatname';
        $( "#cat_fbgroup" ).autocomplete({
            source: source_url,
            minLength: 2,
        });
    }
});