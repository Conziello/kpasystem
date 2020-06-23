// Convert numbers to words
// copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
// permission to use this Javascript on your web page is granted
// provided that all of the code (including this copyright notice) is
// used exactly as shown (you can change the numbering system if you wish)

// American Numbering System
var th = ['','thousand','million', 'billion','trillion'];
// uncomment this line for English Number System
// var th = ['','thousand','million', 'milliard','billion'];

var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}

// Convert figures to money values
Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 }; 


$(document).ready(function(){
	var optionsFloating = $('#optionsFloating');
	var defaultOptionsTop = optionsFloating.offset().top;
	var defaultOptionsBottom = $('#downloadTarget').offset().top - $(window).height();
	var defaultOptionsWidth = optionsFloating.width();
	
	$(window).scroll(function(){
		if( $(window).scrollTop() > defaultOptionsTop - 100 && $(window).scrollTop() < defaultOptionsBottom ){
			optionsFloating.addClass('fixed');
			optionsFloating.width(defaultOptionsWidth)
		}else{
			optionsFloating.removeClass('fixed');
		}
	})
	
	$('.scrollToLink').on('click',function(){
		
		var divId = $(this).attr('data-scroll');
		var scrollTop = $('#'+divId).offset().top - 10;
		
		
		$('html, body').animate({ scrollTop: scrollTop+'px' });
	})
	
	
$('#web_by').hover(function(){
	$('#jobotic').animate({right:'80px'},600, function(){	 $('#web_by label').css('display','block'); });
	},
	function(){
		$('#web_by label').css('display','none').stop(true, true)
		$('#jobotic').animate({right:'1900px'},1800, function(){	 $('#jobotic').css('right','-100px').stop(true, true)	})
});
$('#web_by').click(function(){ window.location.href = 'http://www.steinlinconsulting.com';});
		
	
})

function dashboard(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function newcontact(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:2},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function hidecont(){
	$("#container").hide();
}

function hidemodal(){
	$(".modal").remove();
}

function savecontact(a,b){
var name = $('#name').val();
var bname = $('#bname').val();
var phone = $('#phone').val();
var remarks = $('#remarks').val();
var category = $('#category').val();
		
		if(name==''||phone==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:1,name:name,bname:bname,phone:phone,remarks:remarks,a:a,b:b,category:category},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function findcontact(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:3},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function intopen(a,b){

		switch(a){
			case 1:
			//shop app
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:6,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 2:
			//edit soi
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:4,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;


			case 3:
			//delete soi
			swal({
			  title: "Are you sure?",
			  text: "The entry will be moved to an Archive Database!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Remove it!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:1,b:b,a:3},
				success:function(data){
				swal("Removed!", "The Entry has been removed.", "success");
				$("#normal"+b).hide();
				}
				});
			  
			});
			break;

			
		}
}

function hidediv(){
$('#alertDiv').remove();$('#modalDiv').remove();
}


function importcontacts(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:5},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function sendmessage(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:6},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function checkcontact(code){
var status = $('input[name=include'+ code +']:checked').val();
if(!(status)){status=0;}
$.ajax({
		url:'bridge.php',
		data:{id:6.1,code:code,status:status},
		success:function(data){
			$('#message').html(data);
		}
		});	

}

function selectall(status){
$.ajax({
		url:'bridge.php',
		data:{id:6.2,status:status},
		success:function(data){
			$('#message').html(data);
		}
		});	

}

function selectgroup(name){
$.ajax({
		url:'bridge.php',
		data:{id:6.3,name:name},
		success:function(data){
			$('#message').html(data);
		}
		});	

}

function calcmesslength(){
var message = $('#messages').val();
len=message.length;
mess=Math.ceil(len/160);
$('#messlength').html(len+' characters: '+mess+' of '+mess+' messages.');

}


function savemessage(){
var message = $('#messages').val();
var contlength = $('#contlength').val();

		
		if(contlength==''||contlength==0){
		swal("Error", "No contacts selected!", "error");
		return;
		}

		else if(message==''){
		swal("Error", "No Message Entered!", "error");
		return;
		}
		
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:2,message:message},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}


function viewbackups(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:7},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}






//q-kodi

function findtenant(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:13},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function deposits(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:14},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function savedeposit(a){
var total = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var paid = $('#paid').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var paying = $('#paying').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var date = $('#datepicker-normal').val();
var remarks = $('#remarks').val();
var paymode = $('#paymode').val();
var refno = $('#refno').val();
var tot=parseFloat(paid,10)+parseFloat(paying,10);

		
		if(paying==''||paying==0||remarks==''||paymode==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		if(parseFloat(tot,10)>parseFloat(total,10)){
		swal("Error", "Total Paid cannot be greater than the Total Payable!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:4,paying:paying,date:date,remarks:remarks,param:a,paymode:paymode,refno:refno},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function loftenant(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:70},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function lease(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:16},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function savelease(a){

var remarks = $('#remarks').val();
var leaseno = $('#leaseno').val();
var escalations = $('input[name=escalations]:checked').val();
var tenancyperiod = $('input[name=tenancyperiod]:checked').val();
var leaseperiods = $('input[name=leaseperiods]:checked').val();
var password = $('#password').val();
if(escalations!=1){escalations=0;}if(tenancyperiod!=1){tenancyperiod=0;}if(leaseperiods!=1){leaseperiods=0;}

		
if(remarks==''||leaseno==''||escalations==0||tenancyperiod==0||leaseperiods==0||password==''){
swal("Error", "Make sure you enter all the required fields!", "error");
return;
}

else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:5,remarks:remarks,leaseno:leaseno,password:password,param:a},
success:function(data){
$('#message').html(data);
}
});	
}	

}

function handover(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:18},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function savehandover(a){

var remarks = $('#wysiwyghtml').val();		
if(remarks==''){
swal("Error", "Make sure you enter all the required fields!", "error");
return;
}

else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:6,remarks:remarks,param:a},
success:function(data){
$('#message').html(data);
}
});	
}	

}


function tenantfile(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:20},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function extenants(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:22},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function senddocuments(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:23},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function documents(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:23.1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savesenddocument(){
var person = $('#person').val();
var documents = $('#documents').val();
var remarks = $('#sendremarks').val();

	if(person==''||documents==''||remarks==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:7,documents:documents,remarks:remarks,person:person},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}

function savereceivedocument(did){
var date = $('#datepicker-normal').val();
var time = $('#timepicker-default').val();
var received = $('#received').val();
var remarks = $('#remarks').val();

	if(date==''||time==''||remarks==''||received==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:7.1,time:time,date:date,remarks:remarks,received:received,did:did},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}

function checkout(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:24},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function calcdepayable(input){

var totdeposit = $('#totdeposit').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var unided = $('#unided').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var notded = $('#notded').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var othded = $('#othded').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(unided==''){unided=0;}if(notded==''){notded=0;}if(othded==''){othded=0;}
var tot=parseFloat(unided,10)+parseFloat(notded,10)+parseFloat(othded,10);
var bal=parseFloat(totdeposit,10)-parseFloat(tot,10);
if(parseFloat(bal,10)<0){
swal("Error", "Amount payable cannot be less than zero!", "error");
input.value = 0;
return;
}

format(input);

bal=(bal).formatMoney(2, '.', ',');
$('#depayable').val(bal);

}

function savecheckout(a){
var vacate = $('#datepicker-normal').val();
var notice = $('#datepicker-normal2').val();
var remarks = $('#wysiwyghtml').val();
var paymode = $('#paymode').val();
var refno = $('#refno').val();
var unided = $('#unided').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var notded = $('#notded').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var othded = $('#othded').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var depayable = $('#depayable').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if(vacate==''||notice==''||remarks==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else if(parseFloat(depayable,10)>0&&paymode==''){
		swal("Error", "Enter the Payment Mode!", "error");
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:8,vacate:vacate,notice:notice,remarks:remarks,unided:unided,notded:notded,othded:othded,depayable:depayable,param:a,paymode:paymode,refno:refno},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}

function edittenant(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:26},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savetenant(param){
var bname = $('#bname').val();
var address = $('#address').val();
var phone = $('#phone').val();
var email = $('#email').val();
var dname = $('#dname').val();
var dphone = $('#dphone').val();
var unit = $('#unit').val();
var btype = $('#btype').val();
var etype = $('#etype').val();
var pin = $('#pin').val();
var nextdate = $('#datepicker-normal').val();

//penalty stuff
var penpercent = $('#penpercent').val();
var pendate = $('#pendate').val();
var penstatus = $('input[name=penstatus]:checked').val();
if(penstatus!=1){penstatus=0}
var waivermonth = $('#waivermonth').val();

//DEPOSIT
var depayable = $('#depayable').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var depaid = $('#depaid').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var debal = $('#debal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if(bname==''||address==''||phone==''||email==''||dname==''||dphone==''||unit==''||btype==''||etype==''||nextdate==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:9,bname:bname,address:address,phone:phone,email:email,dname:dname,dphone:dphone,unit:unit,param:param,etype:etype,btype:btype,depayable:depayable,depaid:depaid,debal:debal,pin:pin,nextdate:nextdate,penpercent:penpercent,pendate:pendate,penstatus:penstatus,waivermonth:waivermonth},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}


function savenewtenant(){
var bname = $('#bname').val();
var address = $('#address').val();
var phone = $('#phone').val();
var email = $('#email').val();
var dname = $('#dname').val();
var dphone = $('#dphone').val();
var pin = $('#pin').val();
var unit = $('#unit').val();
var btype = $('#btype').val();

var years  = $('#years').val(); 
var months  = $('#months').val(); 
var payabledate  = $('#datepicker-date').val(); 
var commencedate  = $('#datepicker-normal').val(); 
var escper  = $('#escper').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var escint  = $('#escint').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

//DEPOSIT
var depayable = $('#depayable').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var depaid = $('#depaid').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var debal = $('#debal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if(bname==''||address==''||phone==''||email==''||dname==''||dphone==''||unit==''||btype==''||years==''||months==''||payabledate==''||commencedate==''||escper==''||escint==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:63,bname:bname,address:address,phone:phone,email:email,dname:dname,dphone:dphone,pin:pin,unit:unit,btype:btype,depayable:depayable,depaid:depaid,debal:debal,years:years,months:months,payabledate:payabledate,commencedate:commencedate,escper:escper,escint:escint},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}


function vacate(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:28},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savevacate(param){
var date = $('#datepicker-normal').val();
var remarks = $('#remarks').val();

	if(date==''||remarks==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:10,date:date,remarks:remarks,param:param},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}

function extendcontract(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:30},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function saveextend(param){
var date = $('#datepicker-normal').val();
var remarks = $('#remarks').val();

	if(date==''||remarks==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:11,date:date,remarks:remarks,param:param},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}

function escalations(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:32},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function saveescalation(param){
var start = $('#start'+param).val();
var end = $('#end'+param).val();
var amount  = $('#amount'+param).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if(start==''||end==''||amount==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#save'+param).html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:12,start:start,end:end,amount:amount,param:param},
	success:function(data){
	$('#save'+param).html(data);
	}
	});	
	}	

}

function findproperties(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:34},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addproperties(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:36},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function editproperties(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:37},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function saveproperty(a,b){
var name = $('#name').val();
var location = $('#location').val();
var address = $('#address').val();
var housetype = $('#housetype').val();
var value = $('#value').val();
var owner = $('#owner').val();
var plot = $('#plot').val();
var phone = $('#phone').val();
var remarks = $('#remarks').val();
var units = $('#units').val();
		
		if(name==''||location==''||address==''||housetype==''||name==''||owner==''||plot==''||phone==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:13,name:name,location:location,address:address,housetype:housetype,value:value,owner:owner,plot:plot,phone:phone,units:units,remarks:remarks,a:a,b:b},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}


function findunits(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:35},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addunits(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:39},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function editunits(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:40},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function saveunit(a,b){
var property = $('#property').val();
var roomno = $('#roomno').val();
var floorspace = $('#floorspace').val();
var rescom = $('#rescom').val();
var roomtype = $('#roomtype').val();
var location = $('#location').val();
var rent = $('#rent').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var watermeter = $('#watermeter').val();
var waterprev = $('#waterprev').val();
var elecmeter = $('#elecmeter').val();
var elecprev = $('#elecprev').val();
var remarks = $('#remarks').val();

		
		if(property==''||roomno==''||rescom==''||roomtype==''||location==''||rent==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:14,property:property,roomno:roomno,floorspace:floorspace,rescom:rescom,roomtype:roomtype,location:location,rent:rent,watermeter:watermeter,waterprev:waterprev,elecmeter:elecmeter,elecprev:elecprev,remarks:remarks,a:a,b:b},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function requisition(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:42},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function setprice(){
	var str = $('#itemname').val();
	var parts=str.split('#',2);
	$('#price').val(parts[1]);
}
function calcitemtotal(input){

var qty = $('#qty').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var price = $('#price').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(qty==''){qty=0;}if(price==''){price=0;}
var tot=qty*price;
var vat=tot/1.16*0.16;

tot=(tot).formatMoney(2, '.', ',');
$('#total').val(tot);

vat=(vat).formatMoney(2, '.', ',');
$('#vat').val(vat);

}

function additem(){
var depid = $('#property').val();
var depname=$('#property option:selected').text();
var str = $('#itemname').val();
var parts=str.split('#',2);
var itcode = parts[0];
var itname=$('#itemname option:selected').text();
var quat = $('#qty').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var price = $('#price').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var vat = $('#vat').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var notes = $('#notes').val();
var locid = $('#location').val();
var location=$('#location option:selected').text();


if(depid==''){
	swal("Error", "Select the Property!", "error");	
}
else if(location==''){
swal("Error", "Select the Location!", "error");
}
else if(itcode==''){
swal("Error", "Select the Item Name!", "error");			
}
else if(quat==''){
swal("Error", "Enter the quantity!", "error");	
}
else if(notes==''){
swal("Error", "Enter the Description!", "error");	
}
else{
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
		data:{id:42.2,itcode:itcode,itname:itname,depid:depid,depname:depname,quat:quat,price:price,total:total,location:location,locid:locid,notes:notes,vat:vat},
		success:function(data){
			//do something
			$('#display').html(data);
		}
		});
		$('#itemname').val('');$('#qty').val('');$('#price').val('');$('#total').val('');
}
}
function delitem(pid){
$('#del' + pid).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:'42.3',pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function viewitem(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'42.4'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function removelastitem(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:45%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'42.5'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function emptyitem(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'42.6'},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}


function submititem(){

var tot = $('#totitems').val();
if(tot<1){
swal("Error", "No entries made!", "error");
}	
	else{
		$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:45%" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:'15'},
		success:function(data){
		$('#display').html(data);
		$('#notes').val('');$('#property').val('');$('#location').val('');
		}
		});		
		}	
}

function approvereq(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:43},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function calcitemtotal2(code){

var qty = $('#qty'+code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var price = $('#price'+code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(qty==''){qty=0;}if(price==''){price=0;}
var tot=qty*price;
tot=(tot).formatMoney(2, '.', ',');
$('#total'+code).val(tot);

}

function saveapprove(code){

	var qty = $('#qty'+ code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var price = $('#price'+ code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var total = $('#total'+ code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	
	if(qty==''||price==''){
	swal("Error", "Price and Quantity are mandatory fields!", "error");
	}	
	else{
		
		$('#save'+ code).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:16,code:code,qty:qty,price:price,total:total},
		success:function(data){
		$('#save'+ code).html(data);
		}
		});	
		}	
}

function delapprove(code){
	swal({
			  title: "Are you sure?",
			  text: "The entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete it!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:17,code:code},
				success:function(data){
				swal("Removed!", "The Entry has been removed.", "success");
				$("#normal"+code).hide();
				}
				});
			  
			});
}

function approvedeny(a,b){
			if(a==2){action='Approve';act='Approved';}else {action='Reject';act='Rejected';}
			swal({
			  title: "Are you sure?",
			  text: "You are about to " + action + " this requisition!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, "+ action + " it!",
			  closeOnConfirm: false
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:18,b:b,a:a,action:action},
				success:function(data){
				swal(act +"!", "The requisition has been "+ act, "success");
				$('#message').html(data);
				}
				});
			  
			});
}


function closeout(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:45},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function closereq(a,b){

			if(a==4){action='Approve';act='Approved';}else {action='Reject';act='Rejected';}
			var supid = $('#supplier').val();
			
			if(a==4&&supid==''){
			swal("Error", "Select a supplier!"+supid, "error");
			return
			}

			else{
			
			swal({
			  title: "Are you sure?",
			  text: "You are about to " + action + " this requisition for payment!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, "+ action + " it!",
			  closeOnConfirm: false
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:19,b:b,a:a,action:action,supid:supid},
				success:function(data){
				swal(act +"!", "The requisition has been "+ act, "success");
				$('#message').html(data);
				}
				});
			  
			});
			}
}

function findreq(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:47},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function addreqitems(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:48},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savereqitem(code){

	var name = $('#name'+ code).val();
	var price = $('#price'+ code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var lid =  $('#account'+ code).val();
	var lname=$('#account'+ code +' option:selected').text();
	
	if(name==''||price==''||lid==''){
	swal("Error", "Item name,Account and price are mandatory fields!", "error");
	}	
	else{
		
		$('#save'+ code).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:20,code:code,name:name,price:price,lid:lid,lname:lname},
		success:function(data){
		$('#save'+ code).html(data);
		}
		});	
		}	
}

function delreqitem(code){
	swal({
			  title: "Are you sure?",
			  text: "The item will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete it!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:21,code:code},
				success:function(data){
				swal("Removed!", "The Item has been removed.", "success");
				$("#normal"+code).hide();
				}
				});
			  
			});
}

function addnewreqitem(){

	var name = $('#nitem').val();
	var price = $('#nprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var lid =  $('#naccount').val();
	var lname=$('#naccount option:selected').text();
	
	if(name==''||price==''||lid==''){
	swal("Error", "Item name,Account and price are mandatory fields!", "error");
	}	
	else{
		
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:22,name:name,price:price,lid:lid,lname:lname},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function invoicing(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:49},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function addrent(){
var str = $('#tenant').val();
var parts=str.split('-',3);
var tid = parts[0];
var tname = parts[1];
var roomno = parts[2];
var month = $('#month').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var actid = parts[0];
var actname = parts[1];
var quat = $('#qty').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var price = $('#price').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var notes = $('#notes').val();



if(tid==''){
	swal("Error", "Select a Tenant!", "error");	
}
else if(month==''){
swal("Error", "Select the Month!", "error");
}
else if(actid==''){
swal("Error", "Select the Item Name!", "error");			
}
else if(quat==''){
swal("Error", "Enter the quantity!", "error");	
}
else if(price==''){
swal("Error", "Enter the Price!", "error");	
}

else{
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
		data:{id:49.2,tid:tid,tname:tname,roomno:roomno,month:month,actid:actid,actname:actname,quat:quat,price:price,total:total,notes:notes},
		success:function(data){
			//do something
			$('#display').html(data);
		}
		});
		$('#itemname').val('');$('#qty').val('');$('#price').val('');$('#total').val('');
		$("#tenant").prop("disabled",true);
}
}
function delrent(pid){
$('#del' + pid).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:'49.3',pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function viewrent(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:'49.4'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function removelastrent(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:45%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'49.5'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function emptyrent(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'49.6'},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}


function submitrent(){

var tot = $('#totitems').val();
var fintot = $('#finaltotal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(tot<1){
swal("Error", "No entries made!", "error");
}	
	else{
		$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:45%" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:'23',fintot:fintot},
		success:function(data){
		$('#display').html(data);
		$('#notes').val('');$('#property').val('');$('#location').val('');
		}
		});		
		}	
}

function receipting(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:50},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function checkpaying(pid){

var paying=$('#paying'+pid).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var bal=$('#bal'+pid).html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		/*
		if(parseFloat(bal,10)<parseFloat(paying,10)){
		swal("Error", "Amount being Paid Cannot be more than balance Pending!", "error");
		$('#paying'+pid).val('').focus();
		//e.preventDefault();
		}
		*/


}

function savereceivefee(code){	
	var paying=$('#paying' + code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(paying==''||paying==0){
		swal("Error", "Amount Paid Cannot be zero!", "error");
		//e.preventDefault();
		}
		
	else{

	$('#save' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:50.2,code:code,paying:paying},
	success:function(data){
	$('#save' + code).html(data);
	$("#tenant").prop("disabled",true);
	},
	
	});

	}
}

function submitreceivefee(){
var fintot = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var pid =  $('#paymode').val();
var pname=$('#paymode option:selected').text();
var refno =  $('#refno').val();
var date =  $('#bankdate').val();
var param = $('#tenant').val();
var parts=param.split('-',3);
tid=parts[0];



if(fintot==''){
swal("Error", "No Entries Made!", "error");
}	
else if(tid==''){
swal("Error", "No Student Selected!", "error");
}

else if(pid==''){
swal("Error", "Select Mode of Payment!", "error");
}

else if(date==''){
swal("Error", "Enter the Banking Date!", "error");
}
else if(refno==''){
swal("Error", "Enter the reference No!", "error");
}

else{
$('#receivefee').hide();
$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:24,fintot:fintot,tid:tid,pid:pid,pname:pname,refno:refno,date:date},
success:function(data){
$('#display').html(data);
}
});	
}	
}

function findrent(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:51},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function journalent(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'52'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function addjournal(){
var subid='';
var param = $('#ledgername').val();
var parts=param.split('-',3);
lid=parts[0];
lname=parts[1];
var type = $('#transtype').val();
var amount = $('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(lid==628){subid=$('#tenantname').val();}
if(lid==629){subid=$('#suppliername').val();}
var param = $('#itemname').val();
var parts=param.split('-',2);
item=parts[0];

if(lid==''){
	swal("Error", "Select a Ledger Account!", "error");
}

else if(type==''){
	swal("Error", "Select the transaction type!", "error");
}
else if(amount==''){
	swal("Error", "The Amount field is blank!", "error");
}
else if(lid==628&&subid==''){
	swal("Error", "Select a Tenant!", "error");
}
else if(lid==628&&item==''){
	swal("Error", "Select the Item!", "error");
}
else if(lid==629&&subid==''){
	swal("Error", "Select a Supplier!", "error");
}


else{
		$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:52.3,lid:lid,lname:lname,amount:amount,type:type,subid:subid,item:item},
		success:function(data){
		$('#display').html(data);
		$('.supten').hide();$('#tenantname').val('');$('#suppliername').val('');
		$('#ledgername').parent().find('input:first').focus().val('');	$('#transtype').val('');$('#amount').val('');
		}
		});
	
}
}


function viewjournal(){
$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:52.5},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptyjournal(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:52.6},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function deletejournal(pid){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:52.4,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function removelastjournal(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'52.7'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function submitjournal(){
var tot = $('#totitems').val();
var date = $('#date').val();
var cramount = $('#cramount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var dramount = $('#dramount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var refno = $('#refno').val();
var notes = $('#notes').val();

		if(tot==''||tot==0){
		swal("Error", "No Entries Made!", "error");
		}
		else if(parseFloat(cramount,10)!=parseFloat(dramount,10)){
			swal("Error", "The debit and credit amounts are not equal!", "error");
		}
		else if(date==''){
			swal("Error", "Select the date of the entry!", "error");
		}

		else if(notes==''){
			swal("Error", "Enter the Entry description!", "error");
		}

		else if(refno==''){
			swal("Error", "Enter the reference number for the transaction!", "error");
		//e.preventDefault();
		}
		
		
		else{
		$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:25,date:date,notes:notes,refno:refno,dramount:dramount},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function findjournal(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'53'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function ledgers(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'54'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function saveledger(code){
	var name=$('#name' + code).val();
	var subcat=$('#subcat' + code).val();
	var ledgercode=$('#ledgercode' + code).html();
	$('#save' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:30px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:'26',code:code,ledgercode:ledgercode,name:name,subcat:subcat},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function removeledger(code){
			swal({
			  title: "Are you sure?",
			  text: "The ledger will be removed from Database!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Remove it!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:28,code:code},
				success:function(data){
				swal("Removed!", "The Entry has been removed.", "success");
				$("#normal"+code).hide();
				}
				});
			  
			});
}

function addnewledger(){
	var ledger=$('#ledgername').val();
	var cat=$('#ledgercat').val();
	if(ledger==''||cat==''){
	swal("Error", "All the fields are required!", "error");	
	}
	else{	
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:27,ledger:ledger,cat:cat},
	success:function(data){
	$('#message').html(data);
	
	}
	});
	}
}
function expenses(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'55'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function addexpense(){

var param = $('#ledgername').val();
var parts=param.split('-',3);
eid=parts[0];
ename=parts[1];
var amount = $('#pricexpense').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var desc = $('#desc').val();
 

if(eid==''){
	swal("Error", "Select an Item!", "error");	
	$('#ledgername').parent().find('input:first').focus();
}
else if(amount==''){
	swal("Error", "The Amount field is blank!", "error");	
	$('#pricexpense').focus();	
}
else if(desc==''){
	swal("Error", "Enter the description of the expense!", "error");	
	$('#desc').focus();	
}
else{
		$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:55.1,eid:eid,ename:ename,amount:amount,desc:desc},
		success:function(data){
		$('#display').html(data);
		$('#ledgername').parent().find('input:first').focus().val('');	$('#pricexpense').val('');$('#desc').val('');
		}
		});
	
}
}


function viewexpense(){
	$('#display').html('<img id="img-spinner" src="images/spin.gif" style="position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:55.2},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function setpettybal(bal){
bal=(bal).formatMoney(2, '.', ',');
$('#pettyaccbal').val(bal);
}

function emptyexpense(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:55.3},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function deleteexpense(pid){
	$('#del' + pid).html('<img id="img-spinner" src="img/spin.gif" style="width:30px;margin:5.5px 0" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:55.5,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function removelastexpense(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'55.4'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function submitexpense(){
var tot = $('#totitems').val();
var refno = $('#refno').val();
var lid =  $('#creditledger').val();
var lname=$('#creditledger option:selected').text();	
var date = $('#date').val();
var bal = $('#pettyaccbal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totprice = $('#totprice').val();

		if(tot==''||tot==0){
		swal("Error", "No Entries Made!", "error");	
		}
		else if(lid==''){
		swal("Error", "Select the credit ledger!", "error");	
		}
		else if(date==''){
		swal("Error", "Select the date of the entry!", "error");	
		}
		else if(refno==''){
		swal("Error", "Enter the reference No!"+lid, "error");	
		}
		
	
	else{
		$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:29,lid:lid,lname:lname,date:date,refno:refno},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function bank(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'56'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savebankdep(){
	var param = $('#ledgername').val();
	var parts=param.split('-',3);
	dr=parts[0];
	drname=parts[1];
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var desc=$('#remarks').val();
	var action=$('#action').val();
	
	if(dr==''||amount==''||desc==''){
	swal("Error", "All the fields are required!", "error");
	}
	else if(parseInt(amount,10)==0){
	swal("Error", "Amount posted cannot be Zero!", "error");
	}
	
	
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:30,dr:dr,amount:amount,desc:desc,drname:drname,action:action},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}

function credland(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'57'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savecredland(){
	var landlord=$('#landlord').val();
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var desc=$('#remarks').val();
	
	if(landlord==''||amount==''||desc==''){
		swal("Error", "All the fields are required!", "error");
	}
	
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:'31',landlord:landlord,amount:amount,desc:desc},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}


function payland(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'58'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savepayland(){
	var landlord=$('#landlord').val();
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var desc=$('#remarks').val();
	var paymode=$('#paymode').val();
	
	if(landlord==''||amount==''||desc==''||paymode==''){
		swal("Error", "All the fields are required!", "error");
	}
	
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:'32',landlord:landlord,amount:amount,desc:desc,paymode:paymode},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}

function water(a,b){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'59',a:a,b:b},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function calcwater(diff,res){
	var fixed=$('#fixed').val()
	var water=$('#waterrate').val()*diff;	 
	var sewer=$('#sewerrate').val()*diff;	 

	total=parseFloat(fixed,10)+parseFloat(water,10)+parseFloat(sewer,10);
	water=(water).formatMoney(2, '.', ',');
	sewer=(sewer).formatMoney(2, '.', ',');
	total=(total).formatMoney(2, '.', ',');
	$('#sumtotal2').val(total);
	$('#sumtotal').val(total);
	$('#water').val(water);
	$('#sewer').val(sewer);	
	
}
	
$('#watercurr').keyup(function() {
	var wc = $(this).val();
	if(wc==''){wc=0}
	var wp=$('#waterprev').val();if(wp==''){wp=0;}
	var res=$('#rescom').val();	 
	var diff=parseInt(wc,10) - parseInt(wp,10);
	$('#waterdiff').val(diff);
	calcwater(diff,res);
	
});
$('#waterprev').keyup(function() {
	var wp = $(this).val();
	if(wp==''){wp=0}
	var wc=$('#watercurr').val();
	var res=$('#rescom').val();	 
	var diff=parseInt(wc,10) - parseInt(wp,10);
	$('#waterdiff').val(diff);
	calcwater(diff,res);
});

function addwater(){
	var wp=$('#waterprev').val();
	var wc=$('#watercurr').val();
	var wd=$('#waterdiff').val();
	var fixed=$('#fixed').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var water=$('#water').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var sewer=$('#sewer').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var sum=$('#sumtotal2').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var mon=$('#month').val();
	var dateread=$('#date').val();
	var mtrno=$('#meter').val();
	
	
	var param = $('#units').val();
    var parts=param.split('-',3);
    rid=parts[0];


	fromdep=0;
	if(mon==''){
		swal("Error", "Select the month!", "error");
		$('#month').focus();
		}
	else if(dateread==''){
		swal("Error", "Enter the date meter was read!", "error");
		$('#date').focus();
		}
	else if(rid==''){
		swal("Error", "Select Unit!", "error");
		$('#units').focus();
		}

	else if(total==0||total==''){
		swal("Error", "No amount being posted.Total is zero!", "error");
		}	
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');$.ajax({
	url:'data.php',
	data:{id:33,rid:rid,mtrno:mtrno,mon:mon,fromdep:fromdep,dateread:dateread,wp:wp,wc:wc,wd:wd,water:water,sewer:sewer,fixed:fixed,sum:sum},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}

function electricity(a,b){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'60',a:a,b:b},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function calcelec(diff){

var fixed = $('#fixed').val();
var consumption = $('#vconsumption').val()*diff;
var fuel = $('#vfuel').val()*diff;
var forex = $('#vforex').val()*diff;
var inflation = $('#vinflation').val()*diff;
var arma = $('#varma').val()*diff;
var erc = $('#verc').val()*diff;
var rep = $('#vrep').val()*consumption;
var vat = $('#vvat').val();
var total=parseFloat(consumption,10)+parseFloat(fuel,10)+parseFloat(forex,10)+parseFloat(inflation,10)+parseFloat(fixed,10);
vat =vat * total;
var fintot=parseFloat(total,10)+parseFloat(vat,10)+parseFloat(arma,10)+parseFloat(erc,10)+parseFloat(rep,10);
consumption=(consumption).formatMoney(2, '.', ',');
$('#consumption').val(consumption);
fuel=(fuel).formatMoney(2, '.', ',');
$('#fuel').val(fuel);
forex=(forex).formatMoney(2, '.', ',');
$('#forex').val(forex);
inflation=(inflation).formatMoney(2, '.', ',');
$('#inflation').val(inflation);
arma=(arma).formatMoney(2, '.', ',');
$('#arma').val(arma);
erc=(erc).formatMoney(2, '.', ',');
$('#erc').val(erc);
rep=(rep).formatMoney(2, '.', ',');
$('#rep').val(rep);
vat=(vat).formatMoney(2, '.', ',');
$('#vat').val(vat);
fintot=(fintot).formatMoney(2, '.', ',');
$('#electotal').val(fintot);
$('#elecdiff').val(diff);
}


$('#elecurr').keyup(function() {
	var ec = $(this).val();
	var ep=$('#elecprev').val();if(ep==''){ep=0;}	 if(ec==''){ec=0;}
	var diff=parseFloat(ec,10) - parseFloat(ep,10);
	calcelec(diff);
});
$('#elecprev').keyup(function() {
	var ep = $(this).val();
	var ec=$('#elecurr').val();	 if(ep==''){ep=0;}if(ec==''){ec=0;}
	var diff=parseFloat(ec,10) - parseFloat(ep,10);
	calcelec(diff);

});



function addelec(){
	var ep=$('#elecprev').val();
	var ec=$('#elecurr').val();
	var ed=$('#elecdiff').val();

	var fixed = $('#fixed').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var consumption = $('#consumption').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var fuel = $('#fuel').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var forex = $('#forex').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var inflation = $('#inflation').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var arma = $('#arma').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var erc = $('#erc').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var rep = $('#rep').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var vat = $('#vat').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	var total=$('#electotal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var mon=$('#month').val();
	var dateread=$('#date').val();
	var mtrno=$('#meter').val();
	
	
	var param = $('#units').val();
    var parts=param.split('-',3);
    rid=parts[0];

	fromdep=0;

	if(mon==''){
		swal("Error", "Select the month!", "error");
		$('#month').focus();
		}
	else if(dateread==''){
		swal("Error", "Enter the date meter was read!", "error");
		$('#date').focus();
		}
	else if(rid==''){
		swal("Error", "Select Unit!", "error");
		$('#units').focus();
		}

	else if(total==0||total==''){
		swal("Error", "No amount being posted.Total is zero!", "error");
		}	
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');$.ajax({
	url:'data.php',
	data:{id:34,rid:rid,mtrno:mtrno,mon:mon,fromdep:fromdep,dateread:dateread,ep:ep,ec:ec,ed:ed,fixed:fixed,consumption:consumption,total:total,fuel:fuel,forex:forex,inflation:inflation,arma:arma,erc:erc,rep:rep,vat:vat},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}

function utilpay(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'61'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function utilitypayment(){

	var hid = $('#landlord').val();
	var hname=$('#landlord option:selected').text();
	var lid = $('#utility').val();
	var lname=$('#utility option:selected').text();
	var pid = $('#paymode').val();
	var pname=$('#paymode option:selected').text();
	var month = $('#month').val();
	var billno = $('#billno').val();
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var refno=$('#refno').val();
	var remarks=$('#remarks').val();

	
	if(hid==''||lid==''||pid==''||month==''||billno==''||amount==''||refno==''||remarks==''){
	swal("Error", "All the fields are required!", "error");
	}	
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:36,hid:hid,hname:hname,lid:lid,lname:lname,pid:pid,pname:pname,month:month,billno:billno,amount:amount,refno:refno,remarks:remarks},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}



function company(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:62},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function editcompany(){
var elem = $(this).closest('.item');
var cname = $('#cname').val();
var tel = $('#tel').val();
var add = $('#add').val();
var web = $('#web').val();
var email = $('#email').val();	
var motto = $('#motto').val();
var loc = $('#loc').val();
var pin = $('#pin').val();
var etrno = $('#etrno').val();

		if(cname==''){
		swal("Error", "Enter the Company Name!", "error");
		}
		else if(tel==''){
		swal("Error", "Enter the Company Telephone No.!", "error");
		}
		else if(add==''){
		swal("Error", "Enter the Company Address!", "error");
		}
		else{
		
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:38,cname:cname,tel:tel,add:add,add:add,web:web,email:email,motto:motto,loc:loc,pin:pin,etrno:etrno},
		success:function(data){
		$('#message').html(data);
		}
		});
						
		}
}


function changelogin(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:64},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function postpass(userid){
	
	var opass=$('#opass').val();
	var npass=$('#npass').val();
	var cpass=$('#cpass').val();

	if(opass==''){
	swal("Error", "Enter your old password!", "error");
	}
	else if(npass==''){
	swal("Error", "Enter a new password!", "error");
	}
	else if(cpass==''){
	swal("Error", "Confirm password!", "error");
	}
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:37,opass:opass,npass:npass,cpass:cpass,userid:userid},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}

function adduser(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:63},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addnewuser(){
var name = $('#fname1').val();
var name1 = $('#name1').val();
var user = $('#name1').val() + $('#name2').val();
var pass = $('#pass1').val();
var pos = $('#pos1').val();
var dept = $('#dep1').val();
var branch = $('#branch1').val();


		if(name1==''){
		swal("Error", "Enter the user initials!", "error");
		$('#name1').focus();
		}
		else if(name==''){
		swal("Error", "Enter the full names!", "error");
		$('#fname1').focus();
		}
		else if(pass==''){
		swal("Error", "Enter a valid Password!", "error");
		$('#pass1').focus();
		}
		else if(pos==''){
		swal("Error", "Select the user position!", "error");
		$("#pos1").parent().find("input:first").focus();	
		}
		else if(dept==''){
		swal("Error", "Select the department!", "error");
		$("#dep1").focus();	
		}
		else if(branch==''){
		swal("Error", "Select the department!", "error");
		$("#branch1").focus();
		}
		
	else{
		$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:39,user:user,name:name,pos:pos,pass:pass,dept:dept,branch:branch},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function changeuser(){
	var str = $('#usercombo').val();
	 var parts=str.split('θ',5);
	 $('#user2').val(parts[0]);
	 $('#pos2').val(parts[1]);
	 $('#fname2').val(parts[2]);
	 $('#dep2').val(parts[3]);
	 $('#branch2').val(parts[4]);
}

function edituser(){
var user = $('#user2').val();
var dept = $('#dep2').val();
var pos = $('#pos2').val();
var fname = $('#fname2').val();
var branch = $('#branch2').val();
var rec = $('input[name=respas]:checked').val();
if(rec!=1){rec=0}

		if(user==''||dept==''||pos==''||fname==''||branch==''){
		swal("Error", "All fields are mandatory!", "error");
		}

		else{
		$("#message2").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:40,user:user,pos:pos,dept:dept,fname:fname,branch:branch,rec:rec},
		success:function(data){
		$('#message2').html(data);
		}
		});	
		}
}


function deluser(){
	
	var user = $('#user2').val();
	if(user==''){
	swal("Error", "Select a user!", "error");
	}

	else if(user==1){
	swal("Error", "You cannot delete the Admin User!", "error");
	}
	else{

		//delete soi
			swal({
			  title: "Are you sure?",
			  text: "This user will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Remove them!",
			  closeOnConfirm: false
			},
			function(){
				$("#message2").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:41,user:user},
				success:function(data){
				swal("Removed!", "The User has been removed.", "success");
				$('#message2').html(data);
				}
				});
			  
			});
	}
}


function useraccess(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:65},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function saveaccess(categ,code){
	var rght=$('#right' + code).val();
	$.ajax({
	url:'data.php',
	data:{id:42,code:code,categ:categ,rght:rght},
	success:function(data){
	}
	});
}

function selectuser(a){
	var user = $('#user').val();
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:43,a:a,user:user},
	success:function(data){
			
			$.ajax({
			url:'bridge.php',
			data:{id:66,param:user},
			success:function(data){
			$('#mainp').html(data);
			}
			});

	}
	});
}
function variables(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:67},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function postvariable(){
	
	var vname=$('#vname').val();
	var sysvar=$('#sysvar').val();
	if(sysvar==''){
	swal("Error", "Select a category!", "error");
	}
	else if(vname==''){
	swal("Error", "Enter the variable name!", "error");
	}
		
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:44,sysvar:sysvar,vname:vname},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}
function setcat(){
	 var str = $('#sysvar2').val();
	 var parts=str.split('$',2);
	 var a=parts[0];
	 var b=parts[1];
 	 for(i=0;i<11;i++){
	  $('#opt' + i).hide(); 
	 }	
	$('#opt'+a).show();
	$('#vname2').val('');$('.select').val('');
	 
}
function setvar(a){
	var str = $('#syscat'+a).val();
	 var parts=str.split('$',2);
	 var a=parts[0];
	 var b=parts[1];
	$('#vname2').val(b);	
}


function editvariable(){
	
	 var str = $('#sysvar2').val();
	 var parts=str.split('$',2);
	 var a=parts[0];
	 var sysvar=parts[1];
	 
	var str = $('#syscat'+a).val();
	 var parts=str.split('$',2);
	 var bid=parts[0];
	var vname=$('#vname2').val();
	
	if(sysvar==''){
	swal("Error", "Select a category!", "error");
	}
	else if(vname==''){
	swal("Error", "Enter the variable name!", "error");
	}
		
	else{
	$("#message2").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:45,sysvar:sysvar,vname:vname,bid:bid},
	success:function(data){
	$('#message2').html(data);
	}
	});
	}
}

function deletevariable(){
	
	 var str = $('#sysvar2').val();
	 var parts=str.split('$',2);
	 var a=parts[0];
	 var sysvar=parts[1];
	 
	var str = $('#syscat'+a).val();
	 var parts=str.split('$',2);
	 var bid=parts[0];
	var vname=parts[1];
	
	if(sysvar==''){
	swal("Error", "Select a category!", "error");
	}
	else{
	$("#message2").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:46,sysvar:sysvar,bid:bid,vname:vname},
	success:function(data){
	$('#message2').html(data);
	}
	});
	}
}

function waterrates(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:126},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savewaterrates(){
var water = $('#water').val();
var sewer = $('#sewer').val();
var fixed = $('#fixed').val();

		
		if(water==''||sewer==''||fixed==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:59,water:water,sewer:sewer,fixed:fixed},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function elecrates(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:127},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function saveelecrates(){
var fixed = $('#fixed').val();
var consumption = $('#consumption').val();
var fuel = $('#fuel').val();
var forex = $('#forex').val();
var inflation = $('#inflation').val();
var arma = $('#arma').val();
var erc = $('#erc').val();
var rep = $('#rep').val();
var vat = $('#vat').val();

		
		if(fixed==''||consumption==''||fuel==''||forex==''||inflation==''||arma==''||erc==''||rep==''||vat==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:60,fixed:fixed,consumption:consumption,fuel:fuel,forex:forex,inflation:inflation,arma:arma,erc:erc,rep:rep,vat:vat},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}


function reports(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:68},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function finstate(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:69,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterfinstate(a){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
if(d2==''){
		swal("Error", "Enter the End Dates!", "error");
}
else {window.open("report.php?id=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
function invrep(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:71,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function enterinvrep(a){
if(a==1){tit='item';}if(a==2){tit='Property';}if(a==3){tit='Month';}if(a==4){tit='Item';}
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else if(name==''&&a!=1){
		swal("Error", "Select the "+tit, "error");
}
else if(view==1){
window.open("report.php?id=12&name=" + name  + '&' +  "\ncode=" + a);
}
else {window.open("report.php?id=12&name=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + a);}
}


function receiptrep(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:72,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function enterreceiptrep(a){
if(a==1){tit='item';}if(a==2){tit='Property';}if(a==3){tit='Month';}if(a==4){tit='Item';}
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else if(name==''&&a!=1){
		swal("Error", "Select the "+tit, "error");
}
else if(view==1){
window.open("report.php?id=13&name=" + name  + '&' +  "\ncode=" + a);
}
else {window.open("report.php?id=13&name=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + a);}
}

function summinv(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:73},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersumminv(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=14&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function summrec(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:74},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersummrec(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=15&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}



function invvsrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:75},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterinvvsrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=16&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}


function rentproj(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterrentproj(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Start and End Months!", "error");
}
else {window.open("report.php?id=17&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function contrep(a){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:77},
	success:function(data){
	$('#mainp').html(data);
	}
	});	
}

function entercontrep(){
var code=1;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=18&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function mesrep(a){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:77.1},
	success:function(data){
	$('#mainp').html(data);
	}
	});	
}

function entermesrep(){
var code=1;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = '';
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=55&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}




function tenrep2(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:78},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenrep2(){
var code=2;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Property!", "error");
}

else {window.open("report.php?id=18&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function deprep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:79},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterdeprep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=19&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function leaserep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:80},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterleaserep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=20&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function handoverrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:81},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterhandoverrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=21&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function checkoutrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:82},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entercheckoutrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=22&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function docregrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:83},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterdocregrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=23&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function soirep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:84},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersoirep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=24&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function saprep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:85},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersaprep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=25&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function lofrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:86},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterlofrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=26&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function pretenrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:87},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterpretenrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=27&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function unitsbyprop(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:88},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterunitsbyprop(){
var name = $('#itemname').val();
var code=1;
if(name==''){
	swal("Error", "Select the Property!", "error");
}
else {window.open("report.php?id=29&" + "\ncode=" + code + '&' + "\nname=" + name);}
}

function housetrack(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:125},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterhousetrack(){
var code=2;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Unit!", "error");
}

else {window.open("report.php?id=51&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}


function reqrep1(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:89},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterreqrep1(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var code=1;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=30&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + code);}
}

function reqrep2(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:90},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterreqrep2(){
var code=2;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Property!", "error");
}

else {window.open("report.php?id=30&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function reqrep3(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:91},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterreqrep3(){
var code=3;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Status!", "error");
}

else {window.open("report.php?id=30&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function reprintreq(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:92},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterreprintreq(){
var name = $('#itemname').val();
var code=1;
if(name==''){
	swal("Error", "Select the Requisition!", "error");
}
else {window.open("report.php?id=4&" + "\nrcptno=" + name);}
}

function ledrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:93},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterledrep(){
var code=1;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Ledger!", "error");
}

else {window.open("report.php?id=36&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}
function seejournal(journal){
		$("#seejournal").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:94,journal:journal},
		success:function(data){
		$('#seejournal').html(data);}
		});
}

function tenstate(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:95},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenstate(){
var code=1;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Tenant!", "error");
}

else {window.open("report.php?id=37&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function landstate(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:96},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterlandstate(){
var code=1;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Property!", "error");
}

else {window.open("report.php?id=38&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function supstate(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:97},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersupstate(){
var code=1;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Supplier!", "error");
}

else {window.open("report.php?id=39&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function supageing(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:114},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersupageing(){
var d2 = $('#date2').val();
var code=1;
if(d2==''){
		swal("Error", "Enter the End Date!", "error");
}
else {window.open("report.php?id=47&" + "\nd2=" + d2 + '&' + "\ncode=" + code);}
}

function tenageing(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:128},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenageing(){
var d2 = $('#date2').val();
var code=1;
if(d2==''){
		swal("Error", "Enter the End Date!", "error");
}
else {window.open("report.php?id=52&" + "\nd2=" + d2 + '&' + "\ncode=" + code);}
}

function supinvoicesall(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:115},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersupinvoicesall(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var code=1;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=48&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + code);}
}


function supinvoicesitem(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:116},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersupinvoicesitem(){
var code=2;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Item!", "error");
}

else {window.open("report.php?id=48&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function supinvoicessup(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:117},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersupinvoicessup(){
var code=3;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Supplier!", "error");
}

else {window.open("report.php?id=48&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}

function supinvoicessumm(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:118},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersupinvoicessumm(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var code=1;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=49&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + code);}
}


function logrep(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute;width:30px; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:98},
	success:function(data){
	$('#mainp').html(data);
	}
	});	
}

function enterlogrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var timer1 = $('#timer1').val();
var timer2 = $('#timer2').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
if(name=='All Users'){code=1;}else{code=2;}
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=40&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);}
}

function customrep(){

	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute;width:30px; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:99},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function opentable(){
	var param = $('#tablename').val();
	if(param==''){
		swal("Error", "Select a Table!", "error");
		return;
	}
	 $("#columname").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
			$.ajax({
				url:'bridge.php',
				data:{id:100,param:param},
				success:function(data){
				$('#columname').html(data);
				}
			});
	
}

function showcol(i){
	var colname=$('#colname' + i).html();
	var val=$('input[name=showcol' + i + ']:checked').val();
	if(val!=1){val=0;}
	$.ajax({
	url:'bridge.php',
	data:{id:101,colname:colname,val:val,i:i},
	success:function(data){
	$('#dispres').html(data);
	}
	});
}

function addsearch(i){
	var colname=$('#colname' + i).html();
	var ops=$('#ops' + i).val();
	var searchvalue=$('#val' + i).val();
	if(ops==''){
		swal("Error", "Select an Operator!", "error");
		$('input[name=addsearch' + i + ']').attr('checked', false);
		return;
	}
	var val=$('input[name=addsearch' + i + ']:checked').val();
	if(val!=1){val=0;}
	$.ajax({
	url:'bridge.php',
	data:{id:102,colname:colname,val:val,i:i,ops:ops,searchvalue:searchvalue},
	success:function(data){
	$('#dispres').html(data);
	}
	});
}

function previewquery(i){
	var param = $('#tablename').val();
	var col = $('#order1').val();
	var orderby = $('#order2').val();
	var limit = $('#limit').val();
	if(param==''){
		swal("Error", "Select a table!", "error");
		return;
	}
	$.ajax({
	url:'bridge.php',
	data:{id:103,param:param,limit:limit,orderby:orderby,col:col},
	success:function(data){
	$('#preview').html(data);
	}
	});
}

function runquery(){
	var query = $('#preview').html();
	if(query==''){
		swal("Error", "Preview Query first!", "error");
	}
	else{
		window.open("report.php?id=41");
	}
}
function waterinvrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:104},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterwaterinvrep(){
var mon = $('#month').val();
var code=1;
if(mon==''){
		swal("Error", "Select the Month!", "error");
}
else {window.open("report.php?id=42&" + "\nmon=" + mon);}
}

function elecinvrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:105},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterelecinvrep(){
var mon = $('#month').val();
var code=1;
if(mon==''){
		swal("Error", "Select the Month!", "error");
}
else {window.open("report.php?id=43&" + "\nmon=" + mon);}
}

function utilpayrep1(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:106},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterutilpayrep1(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var code=1;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=44&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + code);}
}

function utilpayrep2(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:107},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterutilpayrep2(){
var code=2;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Property!", "error");
}

else {window.open("report.php?id=44&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}


function utilpayrep3(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:108},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterutilpayrep3(){
var code=3;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Item!", "error");
}

else {window.open("report.php?id=44&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
}


function utilreconrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:109},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterutilreconrep(){
var code=3;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var name2 = $('#itemname2').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Property!", "error");
}

else if(name2==''){
	swal("Error", "Select the Item!", "error");
}

else {window.open("report.php?id=45&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nname2=" + name2);}
}


function supinvoice(){

	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute;width:30px; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:110},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function addbill(){
var depid = $('#property').val();
var depname=$('#property option:selected').text();
var str = $('#itemname').val();
var parts=str.split('#',2);
var itcode = parts[0];
var itname=$('#itemname option:selected').text();
var quat = $('#qty').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var price = $('#price').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var vat = $('#vat').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var notes = $('#notes').val();
var supid = $('#supplier').val();
var supname=$('#supplier option:selected').text();


if(depid==''){
	swal("Error", "Select the Property!", "error");	
}
else if(supid==''){
swal("Error", "Select the Location!", "error");
}
else if(itcode==''){
swal("Error", "Select the Item Name!", "error");			
}
else if(quat==''){
swal("Error", "Enter the quantity!", "error");	
}

else{
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
		data:{id:110.2,itcode:itcode,itname:itname,depid:depid,depname:depname,quat:quat,price:price,total:total,supname:supname,supid:supid,notes:notes,vat:vat},
		success:function(data){
			//do something
			$('#display').html(data);
		}
		});
		$('#itemname').val('');$('#qty').val('');$('#price').val('');$('#total').val('');$("#supplier").prop("disabled",true);$("#property").prop("disabled",true);
}
}
function delbill(pid){
$('#del' + pid).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:'110.3',pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function viewbill(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'110.4'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function removelastbill(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:45%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'110.5'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function emptybill(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'110.6'},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}


function submitbill(){

var tot = $('#totitems').val();
if(tot<1){
swal("Error", "No entries made!", "error");
}	
	else{
		$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:45%" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:'48'},
		success:function(data){
		$('#display').html(data);
		$('#notes').val('');$("#supplier").prop("disabled",false);$("#property").prop("disabled",false);
		}
		});		
		}	
}

function findsupinv(){

	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute;width:30px; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:111},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addsup(){

	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute;width:30px; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:112},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function savesup(code){

	var sname = $('#sname'+ code).val();
	var location = $('#location'+ code).val();
	var cname =  $('#cname'+ code).val();
	var ctel =  $('#ctel'+ code).val();
	var notes =  $('#notes'+ code).val();
	var pin =  $('#pin'+ code).val();
	
	if(sname==''){
	swal("Error", "Supplier Name is mandatory!", "error");
	}	
	else{
		
		$('#save'+ code).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:49,code:code,sname:sname,location:location,cname:cname,ctel:ctel,notes:notes,pin:pin},
		success:function(data){
		$('#save'+ code).html(data);
		}
		});	
		}	
}

function delsup(code){
	swal({
			  title: "Are you sure?",
			  text: "The Supplier will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete them!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:50,code:code},
				success:function(data){
				swal("Removed!", "The Supplier has been removed.", "success");
				$("#normal"+code).hide();
				}
				});
			  
			});
}

function addnewsup(){

	var sname = $('#nsname').val();
	var location = $('#nlocation').val();
	var cname =  $('#ncname').val();
	var ctel =  $('#nctel').val();
	var pin =  $('#npin').val();
	var notes =  $('#nnotes').val();
	
	if(sname==''){
	swal("Error", "Supplier Name is mandatory!", "error");
	}	
	else{
		
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:51,sname:sname,location:location,cname:cname,ctel:ctel,notes:notes,pin:pin},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function paysup(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:113},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function savesuppay(code){	
	var paying=$('#paying' + code).val();
	if(paying==''||paying==0){
		swal("Error", "Amount Paid Cannot be zero!", "error");
		//e.preventDefault();
		}
		
	else{

	$('#save' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:113.2,code:code,paying:paying},
	success:function(data){
	$('#save' + code).html(data);
	$("#tenant").prop("disabled",true);
	},
	
	});

	}
}

function submitsuppay(){
var fintot = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var pid =  $('#paymode').val();
var pname=$('#paymode option:selected').text();
var refno =  $('#refno').val();
var param = $('#supplier').val();
var parts=param.split('-',2);
supid=parts[0];



if(fintot==''||fintot==0){
swal("Error", "No Entries Made!", "error");
}	
else if(supid==''){
swal("Error", "No Supplier Selected!", "error");
}

else if(pid==''){
swal("Error", "Select Mode of Payment!", "error");
}


else if(refno==''){
swal("Error", "Enter the reference No!", "error");
}

else{
$('#receivefee').hide();
$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:52,fintot:fintot,supid:supid,pid:pid,pname:pname,refno:refno},
success:function(data){
$('#display').html(data);
}
});	
}	
}

function monthlyinvoicing(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:119},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function changeproperty(db){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:122,db:db},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function postrentauto(a){
var month = $('#month').val();
if(month==''){
		swal("Error", "Enter the Month!", "error");
}
else {

		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:53,month:month},
		success:function(data){
		$('#message').html(data);
		}
		});	

}
}

function newtask(a){
var task = $('#newtodo').val();
if(task==''){
		swal("Error", "Enter the Task Description!", "error");
}
else {

		$('#alltasks').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:54,task:task},
		success:function(data){
		$('#alltasks').html(data);
		$('#newtodo').val('').focus();
		}
		});	

}
}

function checktask(code){
var status = $('input[name=todo'+ code +']:checked').val();
if(!(status)){status=0;}
$.ajax({
		url:'data.php',
		data:{id:55,code:code,status:status},
		success:function(data){
		}
		});	

}
function checktask2(code){
$.ajax({
		url:'data.php',
		data:{id:55,code:code,status:1},
		success:function(data){
			loadtasks();
		}
		});	

}
function vatrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:120},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function entervatrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var type = $('input[name=format]:checked').val();
var code=1;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else if(view==1){
window.open("report.php?id=50&code=" + code + '&' + "\ntype=" + type);
}
else {window.open("report.php?id=50&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ntype=" + type);}
}

function inpvatrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:129},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function enterinpvatrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var type = $('input[name=format]:checked').val();
var code=1;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else if(view==1){
window.open("report.php?id=53&code=" + code + '&' + "\ntype=" + type);
}
else {window.open("report.php?id=53&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ntype=" + type);}
}


function postpenalties(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:121},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function postpenauto(a){
var month = $('#month').val();
if(month==''){
		swal("Error", "Enter the Month!", "error");
}
else {

		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:56,month:month},
		success:function(data){
		$('#message').html(data);
		}
		});	

}
}

function markasread(code){
	$.ajax({
	url:'data.php',
	data:{id:57,code:code},
	success:function(data){
		$("#mess"+code).css({'background' : '#fff'});
		$("#read"+code).show();	$("#unread"+code).hide();	
		loadnotifications();
		
	}
	});
}

function checknotif(code){
$.ajax({
		url:'data.php',
		data:{id:57,code:code,status:1},
		success:function(data){
			loadnotifications();
		}
		});	

}

function loadtasks(){
	$("#maintasks").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:123},
	success:function(data){
	$('#maintasks').html(data);
	}
	});
}

function loadnotifications(){
	$("#mainnotifications").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:124},
	success:function(data){
	$('#mainnotifications').html(data);
	}
	});
}

function togglenewevent(){
	 $( "#newevent" ).toggle();
}
function togglenewsms(){
	 $( "#newsms" ).toggle();
}
function addnewevent(){
	var date  = $('#eventdate').val(); 
	var name  = $('#eventname').val(); 

	if(date==''||name==''){
		swal("Error", "The Event, Date and Time fields are required.!", "error");
		return;
	}
	else{

	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:58,name:name,date:date},
	success:function(data){
	$('#message').html(data);
	}
	});

	}
}

function addnewsms(){
	var phone  = $('#phone2').val(); 
	var message  = $('#message2').val(); 
	
	if(phone==''||message==''){
		swal("Error", "All fields are required", "error");
		return;
	}
	else{

	$("#loader2").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:3,phone:phone,message:message},
	success:function(data){
	$('#loader2').html(data);
	}
	});

	}
}

function editlof(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:130},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function savelof(lof){
	var years  = $('#years').val(); 
	var months  = $('#months').val(); 
	var monrent  = $('#monrent').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var payabledate  = $('#datepicker-date').val(); 
	var escper  = $('#escper').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var escint  = $('#escint').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var utildep  = $('#utildep').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var depmonths  = $('#depmonths').val(); 
	var depmonthscurrent  = $('#depmonthscurrent').val(); 
	var commencedate  = $('#datepicker-normal').val(); 
	var fitperiod  = $('#fitperiod').val();
	var lawyer  = $('#advocate').val();
	var usage  = $('#usage').val();

	var rid  = $('#rid').val(); 
	var roomno  = $('#roomno').val(); 
	var location  = $('#location').val(); 
	var bname  = $('#bname').val(); 
	var address  = $('#address').val(); 
	var chequename  = $('#chequename').val();
	var payment  = $('#payment_breakdown').val(); 
	var servicecharge  = $('#servicecharge').val(); 
	

	if(bname==''||address==''||chequename==''||rid==''||location==''||years==''||months==''||monrent==''||payabledate==''||utildep==''||depmonths==''||escper==''||escint==''||fitperiod==''||lawyer==''||usage==''||commencedate==''||depmonthscurrent==''||payment==''){
		swal("Error", "All fields are required.!", "error");
		return;
	}
	else{

	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:61,lof:lof,bname:bname,address:address,chequename:chequename,rid:rid,roomno:roomno,location:location,years:years,months:months,monrent:monrent,payabledate:payabledate,escper:escper,escint:escint,fitperiod:fitperiod,lawyer:lawyer,usage:usage,utildep:utildep,depmonths:depmonths,commencedate:commencedate,depmonthscurrent:depmonthscurrent,payment:payment,servicecharge:servicecharge},
	success:function(data){
	$('#message').html(data);
	}
	});

	}
}

function searchdash(){
	var search  = $('#searchfield').val(); 
	var categ = $('input[name=category]:checked').val();
	if(search==''){
		swal("Error", "Enter a search Term!", "error");
		$('#searchfield').focus(); 
		return;
	}
	else{
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:132,search:search,categ:categ},
	success:function(data){
	$('#mainp').html(data);
	}
	});
	}
}

function openlinks(categ,recid){


	switch(categ){

	case 1:

		$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:21,param:recid},
		success:function(data){
		$('#mainp').html(data);
		}
		});

	break;

	case 2:
	/*
		$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:41,param:recid},
		success:function(data){
		$('#mainp').html(data);
		}
		});

	*/

	break;

	case 3:

	window.open("report.php?id=5&rcptno=" + recid);

	break;

	case 4:

	window.open("report.php?id=6&rcptno=" + recid);

	break;

	case 5:
	window.open("uploads/tenants/" + recid);

	break;

	case 6:

	window.open("report.php?id=4&rcptno=" + recid);

	break;


	}
}


function automation(){

			swal({
			  title: "Are you sure?",
			  text: "Several Records will be updated",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Update!",
			  closeOnConfirm: true
			},
			function(){

				$.ajax({
				url:'bridge.php',
				data:{id:133},
				success:function(data){
				$('#automate').html(data);
				$('#myModal').css({'background' : '#333','opacity' : '1'});
				}
				});
			  
			});



	
}


function cancelmodal(){
	$('#myModal').addClass('fade');
	$('#myModal').remove();
	$('#myModal').css({'display' : 'none'});
	//$('#dashboard').css({'background' : 'none','opacity' : '1'});
	swal("Success!", "Update Complete!", "success");

}

function updatescript(){
	$.ajax({
	url:'update.php',
	data:{},
	success:function(data){
	$('#automess').html(data);
	}
	});
}

function logout(){

			swal({
			  title: "Logout Confirmation",
			  text: "Are you sure you want to logout?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Logout!",
			  closeOnConfirm: false
			},
			function(){

				window.location.href = "logout.php";
			  
			});



	
}

function deldoc(param){

			swal({
			  title: "Delete Confirmation",
			  text: "Are you sure you want to delete this document?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete!",
			  closeOnConfirm: true
			},
			function(){

				$.ajax({
				url:'data.php',
				data:{id:64,param:param},
				success:function(data){
				$('#doc'+param).remove();
				swal("Deleted!", "Your document has been deleted.", "success");
				}
				});
			  
			});

}


function escrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:135},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterescrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=54&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}



function userprofile(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:138},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


//portal begins here

function calendarpanel(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:208},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function cmepanel(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:209},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function opencmepanel(param){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:210,param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function submitcme(cmeid){
	var cmeid = $('#cmeid').val();
	swal({
			  title: "Confirmation?",
			  text: "Do you confirm to have studied this CME to its entirety?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Confirm!",
			  closeOnConfirm: true
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:115,cmeid:cmeid},
				success:function(data){
				$('#message').html(data);
				}
				});
			  
			});
}

function forumpanel(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:211},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savecomment(forumid){
	var comment = $('#commentarea'+forumid).val();
	swal({
			  title: "Add comment?",
			  text: "Do you want to post this comment to the current forum?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$('#message'+forumid).html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:116,forumid:forumid,comment:comment},
				success:function(data){
				$('#message'+forumid).html(data);
				}
				});
			  
			});
}

function statementpanel(param){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:212,param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterstatement(a){
a=0;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = 0;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(view==1){
window.open("report.php?id=37&name=" + name  + '&' +  "\ncode=" + a);
}
else {window.open("report.php?id=37&name=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + a);}
}


function saveprofile(param){

var address = $('#address').val();
var phone = $('#phone').val();
var email = $('#email').val();


var pin = $('#pin').val();


var eyear = $('#eyear').val();
var gname = $('#gname').val();
var grship = $('#grship').val();
var gphone = $('#gphone').val();
var idno = $('#idno').val();


var currfacility  = $('#currfacility').val(); 
var county  = $('#county').val(); 
var subcounty  = $('#subcounty').val(); 




if(address==''||phone==''||email==''||idno==''||eyear==''){
swal("Error", "Make sure you enter all the required fields!", "error");
return;
}


else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:117,param:param,address:address,phone:phone,email:email,pin:pin,currfacility:currfacility,county:county,subcounty:subcounty,gname:gname,grship:grship,gphone:gphone,idno:idno,eyear:eyear},
success:function(data){
$('#message').html(data);
}
});	
}	

}

function renewmembership(year){

		swal({
			  title: "Are you sure?",
			  text: "Do you want to renew your Membership for the year "+year+ "?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Renew!",
			  closeOnConfirm: true
			},
			function(){
				$('#renewdiv').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:1.1},
				success:function(data){
				$('#renewdiv').html(data);
				}
				});
			  
			});
}