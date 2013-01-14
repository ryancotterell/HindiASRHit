<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
   

/**
Extracts the url parameters 
*/
function gup(paramname)
{
    var regexS = "[\\?&]"+paramname+"=([^&#]*)";
    var regex = new RegExp(regexS);
    var tmpURL = decodeURI(window.location.href); // decodeURI to preserve UTF                                                                                                                            
    var results = regex.exec(tmpURL);
    if (results == null)
	return "";
    else
	return results[1];
}


/**
Addds the worker information to a form name   
*/
function addWorkerInfo(form_name) 
{  
    $('#' + form_name).append('<input type="hidden" name="assignmentId"/>');
    $('#' + form_name).append('<input type="hidden" name="HIT_info"/>');
    $('#' + form_name).append('<input type="hidden" name="workerId"/>');
    $('#' + form_name).append('<input type="hidden" name="WorkerCity"/>');
    $('#' + form_name).append('<input type="hidden" name="WorkerCountry"/>');
        
    $('#assignmentId').val(gup('assignmentId'));
    $('#HIT_info').val(gup('HIT_info'));
    $('#AID').val(gup('workerId'));
    $('#WorkerCity').val(geoplugin.city());
    $('#WorkerCountry').val(geoplugin_countryName()); 
}


