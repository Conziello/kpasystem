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



function dashboard(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function interest(){
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
	$("#mainp").html('');$("#mainp").html('');
}

function hidemodal(){
	$(".modal").remove();
}

function saveinterest(a,b){
var name = $('#name').val();
var bname = $('#bname').val();
var phone = $('#phone').val();
var remarks = $('#remarks').val();

		
		if(name==''||bname==''||phone==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:1,name:name,bname:bname,phone:phone,remarks:remarks,a:a,b:b},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function findinterest(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:3},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function openoptmodal(a,b){
$('#modaltrigger a')[0].click();
}


function majoropen(a){
var b = $('#tenparam').val();
$('#dismissmodal i')[0].click();

setTimeout(function() {

switch(a){

case 4:
			//edit tenant
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:27,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 5:
			//tenant info
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:21,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 6:
			//invoice tenant
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:49,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 7:
			//receipt tenant
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:50,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 8:
			archivemember(b);

			break;

			case 10:
			//EDIT UNIT
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:41,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;


			case 11:
			//assign card
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:184,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 12:
			//assign card
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:184,tid:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 13:
			//unassign card
			swal({
			  title: "Are you sure?",
			  text: "The Card will be Un-assigned from this Member!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:97,b:b},
				success:function(data){
				swal("Removed!", "Card Un-Assigned.", "success");
				}
				});
			  
			});
			break;

			case 14:
			//edit workshop
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:187,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 15:
			//workshop file
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:189,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 16:
			//delete workshop
			swal({
			  title: "Are you sure?",
			  text: "The Worshop entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:99,param:b},
				success:function(data){
				swal("Removed!", "Entry deleted.", "success");
				$('#mainp').html(data);
				}
				});
			  
			});
			break;

			case 17:
			//workshop attendance
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:191,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 18:
			//edit forum
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:194,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 19:
			//forum file
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:197,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 20:
			//delete forum
			swal({
			  title: "Are you sure?",
			  text: "The Forum entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:102,param:b},
				success:function(data){
				swal("Removed!", "Entry deleted.", "success");
				$('#mainp').html(data);
				}
				});
			  
			});
			break;


			case 21:
			//edit cme
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:200,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 22:
			//cme file
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:203,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 23:
			//delete cme
			swal({
			  title: "Are you sure?",
			  text: "The CME entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:104,param:b},
				success:function(data){
				swal("Removed!", "Entry deleted.", "success");
				$('#mainp').html(data);
				}
				});
			  
			});
			break;


			case 24:
			//rresend sms
			swal({
			  title: "Are you sure?",
			  text: "The SMS entry will be resent!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:111,param:b},
				success:function(data){
				$('#mainp').html(data);
				}
				});
			  
			});
			break;

			case 25:
			//delete sms
			swal({
			  title: "Are you sure?",
			  text: "The SMS entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:112,param:b},
				success:function(data){
				$('#mainp').html(data);
				}
				});
			  
			});
			break;

			case 26:
			//rresend sms
			swal({
			  title: "Are you sure?",
			  text: "The Email entry will be resent!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:113,param:b},
				success:function(data){
				$('#mainp').html(data);
				}
				});
			  
			});
			break;

			case 27:
			//delete sms
			swal({
			  title: "Are you sure?",
			  text: "The Email entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:114,param:b},
				success:function(data){
				$('#mainp').html(data);
				}
				});
			  
			});
			break;






}

},500); 


}

function deleteworkshop(b){

	swal({
			  title: "Are you sure?",
			  text: "The Worshop entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:99,param:b},
				success:function(data){
				swal("Removed!", "Entry deleted.", "success");
				$('#mainp').html(data);
				}
				});
			  
			});

}

function deleteforum(b){

	swal({
			  title: "Are you sure?",
			  text: "The Forum entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:102,param:b},
				success:function(data){
				swal("Removed!", "Entry deleted.", "success");
				$('#mainp').html(data);
				}
				});
			  
			});

}


function deletecme(b){

	swal({
			  title: "Are you sure?",
			  text: "The CME entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:104,param:b},
				success:function(data){
				swal("Removed!", "Entry deleted.", "success");
				$('#mainp').html(data);
				}
				});
			  
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

			

			case 9:
			//EDIT PROPERTY
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:38,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			

			case 11:
			//ARCHIVE PROPERTY
			archiveproperty(b);

			break;

			case 12:
			//landlord info
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:145,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 13:
			//RESTORE PROPERTY
			restoreproperty(b);

			break;


			default:

			//landlord info
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:a,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});
			break;
			

		}
}

function shopapp(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:5},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function hidediv(){
$('#alertDiv').remove();$('#modalDiv').remove();
}



function saveshopapp(a,b,c){
var bname = $('#bname').val();
var nature = $('#nature').val();
var period = $('#period').val();
var phone = $('#phone').val();
var address = $('#address').val();
var email = $('#email').val();
var location = $('#location').val();
var bankers = $('#bankers').val();

var dname1 = $('#dname1').val();
var dphone1 = $('#dphone1').val();
var dname2 = $('#dname2').val();
var dphone2 = $('#dphone2').val();
var dname3 = $('#dname3').val();
var dphone3 = $('#dphone3').val();


var rname1 = $('#rname1').val();
var rphone1 = $('#rphone1').val();
var rcom1 = $('#rcom1').val();
var rname2 = $('#rname2').val();
var rphone2 = $('#rphone2').val();
var rcom2 = $('#rcom2').val();

var spacedetails = $('#spacedetails').val();
var spacespecial = $('#spacespecial').val();
var odetail = $('#odetail').val();		

		if(bname==''||nature==''||email==''||address==''||phone==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:2,bname:bname,nature:nature,period:period,phone:phone,address:address,email:email,location:location,bankers:bankers,a:a,b:b,c:c,dname1:dname1,dphone1:dphone1,
			dname2:dname2,dphone2:dphone2,dname3:dname3,dphone3:dphone3,rname1:rname1,rphone1:rphone1,rcom1:rcom1,rname2:rname2,rphone2:rphone2,rcom2:rcom2,spacedetails:spacedetails,
			spacespecial:spacespecial,odetail:odetail},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function findshop(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:7},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function shopopen(a,b){

		switch(a){
			case 1:
			//lof
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:11,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 2:
			//edit sap
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:8,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;


			case 3:
			//delete SAP
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
				data:{id:2,b:b,a:3},
				success:function(data){
				swal("Removed!", "The Entry has been removed.", "success");
				$("#normal"+b).hide();
				}
				});
			  
			});
			break;

			case 4:
			//view sap
			$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
			$.ajax({
			url:'bridge.php',
			data:{id:9,param:b},
			success:function(data){
			$('#mainp').html(data);
			}
			});

			break;

			case 5:
			//view lof
			window.open("report.php?id=1&rcptno=" + b);

			break;

			case 6:
			//archive lof
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
				data:{id:3.2,param:b},
				success:function(data){
				swal("Removed!", "The LOF has been removed.", "success");
				$("#normal"+b).hide();
				}
				});
			  
			});

			break;

			case 7:
			//acivate tenancy
			swal({
			  title: "Are you sure?",
			  text: "The tenant file will be created!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Create Tenant!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:3.1,param:b},
				success:function(data){
				$("#normal"+b).hide();
				$("#message").html(data);
				}
				});
			  
			});
			break;

		}
}
function setype(type){
	$('#doctype').val(type); 
}
function uphoto(){
var fname  = $('#fname').val(); 
 if(fname!=''){
 	$( '#certdiv' ).append( '<div class="alert alert-success" style="padding:5px"> <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>' + fname + '</strong> </div><div class="cleaner"></div>' );
	}

}

function lof(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:10},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function calcesc(){
	var unit  = $('#leasetam').val(); 
	var rid  = $('#rid').val(); 
	var roomno  = $('#roomno').val(); 
	var location  = $('#location').val(); 
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
	

	if(unit==''||location==''||years==''||months==''||monrent==''||payabledate==''||utildep==''||depmonths==''||escper==''||escint==''||fitperiod==''||lawyer==''||usage==''||commencedate==''||depmonthscurrent==''){
		swal("Error", "All fields are required.!", "error");
		return;
	}
	else{

	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:12,unit:unit,rid:rid,roomno:roomno,location:location,years:years,months:months,monrent:monrent,payabledate:payabledate,escper:escper,escint:escint,fitperiod:fitperiod,lawyer:lawyer,usage:usage,utildep:utildep,depmonths:depmonths,commencedate:commencedate,depmonthscurrent:depmonthscurrent},
	success:function(data){
	$('#message').html(data);
	}
	});

	}
}

function format(input) {
                var nStr = input.value + '';
                nStr = nStr.replace( /\,/g, "");
                x = nStr.split( '.' );
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while ( rgx.test(x1) ) {
                    x1 = x1.replace( rgx, '$1' + ',' + '$2' );
                }
                input.value = x1 + x2;
   }

function setunit(){
	var str = $('#unit').val();
	var parts=str.split('#',4);
	 $('#rid').val(parts[0]);
	 $('#roomno').val(parts[1]);
	 $('#location').val(parts[2]);
	  $('#monrent').val(parts[3]);
}

function submitlof(sap){
	var rid  = $('#rid').val(); 
	var roomno  = $('#roomno').val(); 
	var location  = $('#location').val(); 
	var bname  = $('#bname').val(); 
	var address  = $('#address').val(); 
	var chequename  = $('#chequename1').val(); 
	var depositinfo  = $('#depositinfo').val(); 
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
	var servicecharge  = $('#servicecharge').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	//OTHER VARIABLES
	var rescom = $('#rescom').val();
	var vatstatus = $('input[name=vatstatus]:checked').val();
	if(vatstatus!=1){vatstatus=0}
	var penpercent = $('#penpercent').val();
	var pendate = $('#pendate').val();
	var penstatus = $('input[name=penstatus]:checked').val();
	if(penstatus!=1){penstatus=0}

	

	if(unit==''||location==''||years==''||months==''||monrent==''||payabledate==''||utildep==''||depmonths==''||escper==''||escint==''||fitperiod==''||lawyer==''||usage==''||commencedate==''||depmonthscurrent==''||chequename==''){
		swal("Error", "All fields are required.!", "error");
		return;
	}
	else{

	$("#messagediv").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:3,sap:sap,bname:bname,address:address,chequename:chequename,depositinfo:depositinfo,rid:rid,roomno:roomno,location:location,years:years,months:months,monrent:monrent,payabledate:payabledate,escper:escper,fitperiod:fitperiod,lawyer:lawyer,usage:usage,utildep:utildep,depmonths:depmonths,commencedate:commencedate,depmonthscurrent:depmonthscurrent,escint:escint,servicecharge:servicecharge,penstatus:penstatus,pendate:pendate,penpercent:penpercent,vatstatus:vatstatus,rescom:rescom},
	success:function(data){
	$('#messagediv').html(data);
	}
	});

	}
}

function newtenant(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:134},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function activations(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:136},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function removeactivation(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:137},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function closeactivation(param){

			swal({
			  title: "Are you sure?",
			  text: "This Record will be removed from the Current Activations Database",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Remove!",
			  closeOnConfirm: true
			},
			function(){
				$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:66,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
				});
			  
			});



	
}

function saveactivation(){
var bname = $('#bname').val();
var address = $('#address').val();
var phone = $('#phone').val();
var email = $('#email').val();
var dname = $('#dname').val();
var dphone = $('#dphone').val();
var pin = $('#pin').val();
var details = $('#details').val();


	if(bname==''||address==''||phone==''||email==''||dname==''||dphone==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:65,bname:bname,address:address,phone:phone,email:email,dname:dname,dphone:dphone,pin:pin,details:details},
	success:function(data){
	$('#message').html(data);
	}
	});	
	}	

}




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

		
if(remarks==''||escalations==0||tenancyperiod==0||leaseperiods==0||password==''){
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
var tenbal = $('#tenbal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(unided==''){unided=0;}if(notded==''){notded=0;}if(othded==''){othded=0;}if(tenbal==''){tenbal=0;}
var tot=parseFloat(unided,10)+parseFloat(notded,10)+parseFloat(othded,10)+parseFloat(tenbal,10);
var bal=parseFloat(totdeposit,10)-parseFloat(tot,10);
if(parseFloat(bal,10)<0){
//swal("Error", "Amount payable cannot be less than zero!", "error");
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
var tenbal = $('#tenbal').val();
var refno = $('#refno').val();
var unided = $('#unided').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var notded = $('#notded').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var othded = $('#othded').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var depayable = $('#depayable').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if(parseFloat(depayable,10)>0&&paymode==''){
		swal("Error", "Enter the Payment Mode!", "error");
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:8,vacate:vacate,notice:notice,tenbal:tenbal,remarks:remarks,unided:unided,notded:notded,othded:othded,depayable:depayable,param:a,paymode:paymode,refno:refno},
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

var eno = $('#enrollmentno').val();
var eyear = $('#enrollmentyear').val();

var pin = $('#pin').val();
var idno = $('#idno').val();
var btype = $('#btype').val();

var currfacility  = $('#currfacility').val(); 
var county  = $('#county').val(); 
var subcounty  = $('#subcounty').val(); 


var gname = $('#gname').val();
var grship = $('#grship').val();
var gphone = $('#gphone').val();
var soi = $('#soi').val();
var mgroup = $('#mgroup').val();

if(bname==''||address==''||phone==''||email==''||eno==''||eyear==''||idno==''){
swal("Error", "Make sure you enter all the required fields!", "error");
return;
}


else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:9,param:param,bname:bname,address:address,phone:phone,email:email,eno:eno,eyear:eyear,pin:pin,idno:idno,btype:btype,gname:gname,grship:grship,gphone:gphone,currfacility:currfacility,county:county,subcounty:subcounty,soi:soi,mgroup:mgroup},
success:function(data){
$('#message').html(data);
}
});	
}	

}

function selecthouse(rid,rno){



	$('#housediv').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:134.1,rid:rid,rno:rno},
	success:function(data){
	$('#housediv').html(data);
	}
	});	
}

function selecthouses(tid){

	$('#housediv').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:134.3,tid:tid},
	success:function(data){
	$('#housediv').html(data);
	}
	});	
}


function removehouse(rid){

	$.ajax({
	url:'bridge.php',
	data:{id:134.2,rid:rid},
	success:function(data){
		$('#housediv2').html(data);
	}
	});	
}
function savenewtenant(){
var bname = $('#bname').val();
var address = $('#address').val();
var phone = $('#phone').val();
var email = $('#email').val();

var eno = $('#enrollmentno').val();
var eyear = $('#enrollmentyear').val();

var pin = $('#pin').val();
var idno = $('#idno').val();
var btype = $('#btype').val();

var currfacility  = $('#currfacility').val(); 
var county  = $('#county').val(); 
var subcounty  = $('#subcounty').val(); 


var gname = $('#gname').val();
var grship = $('#grship').val();
var gphone = $('#gphone').val();
var soi = $('#soi').val();

var mgroup = $('#mgroup').val();

if(bname==''||address==''||phone==''||email==''||eno==''||eyear==''||idno==''){
swal("Error", "Make sure you enter all the required fields!", "error");
return;
}


else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:63,bname:bname,address:address,phone:phone,email:email,eno:eno,eyear:eyear,pin:pin,idno:idno,btype:btype,gname:gname,grship:grship,gphone:gphone,currfacility:currfacility,county:county,subcounty:subcounty,soi:soi,mgroup:mgroup},
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
var fid = $('#fieldperson').val();
var fname=$('#fieldperson option:selected').text();
var sid = $('#salesperson').val();
var sname=$('#salesperson option:selected').text();
var paydate = $('#paydate').val();
var commencedate = $('#commencedate').val();
var commision = $('#commision').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var water = $('#water').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var email = $('#email').val();
var idno = $('#idno').val();
var pin = $('#pin').val();
var gname = $('#gname').val();
var grship = $('#grship').val();
var gphone = $('#gphone').val();
var bankname = $('#bankname').val();
var branchname = $('#branchname').val();
var acname = $('#acname').val();
var acno = $('#acno').val();
var carename = $('#carename').val();
var carephone = $('#carephone').val();
var gemail = $('#gemail').val();
var gidno = $('#gidno').val();
var depositheldby = $('#depositheldby').val();
var utilitiesby = $('#utilitiesby').val();

var vatstatus = $('input[name=vatstatus]:checked').val();
if(vatstatus!=1){vatstatus=0}
		
		if(name==''||location==''||address==''||housetype==''||name==''||owner==''||plot==''||phone==''||idno==''||commision==''||water==''||paydate==''||fid==''||commencedate==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}

		
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:13,fid:fid,fname:fname,carename:carename,carephone:carephone,gemail:gemail,gidno:gidno,sid:sid,sname:sname,depositheldby:depositheldby,utilitiesby:utilitiesby,paydate:paydate,commencedate:commencedate,water:water,email:email,idno:idno,pin:pin,gname:gname,grship:grship,gphone:gphone,bankname:bankname,branchname,acname:acname,acno:acno,name:name,location:location,address:address,housetype:housetype,value:value,owner:owner,plot:plot,phone:phone,units:units,remarks:remarks,a:a,b:b,commision:commision,vatstatus:vatstatus},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function archiveproperty(b){



			swal({
			  title: "Are you sure?",
			  text: "The Property will be Archived!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Archive it!",
			  closeOnConfirm: true
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:13.1,b:b},
				success:function(data){
				$('#message').html(data);
				}
				});	
			  
			});

	
}

function archivemember(b){



			swal({
			  title: "Are you sure?",
			  text: "The Member will be Archived!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Archive them!",
			  closeOnConfirm: true
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:13.3,b:b},
				success:function(data){
				$('#message').html(data);
				}
				});	
			  
			});

	
}

function activatemember(b){



			swal({
			  title: "Are you sure?",
			  text: "The Member will be activated!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, activate them!",
			  closeOnConfirm: true
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:13.4,b:b},
				success:function(data){
				$('#message').html(data);
				}
				});	
			  
			});

	
}

function restoreproperty(b){



			swal({
			  title: "Are you sure?",
			  text: "The Property will be Restored!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Restore it!",
			  closeOnConfirm: true
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:13.2,b:b},
				success:function(data){
				$('#message').html(data);
				}
				});	
			  
			});

	
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

function shownotforent(){
var housestatus = $('#housestatus').val();
if(housestatus=='Not for Rent'){
	$('#notforrent').show();
	$('#tenant').focus();
}else{
	$('#notforrent').hide();
}


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
var elecmeterserial= $('#elecmeterserial').val();
var elecmaxload= $('#elecmaxload').val();
var elecprev = $('#elecprev').val();
var remarks = $('#remarks').val();
var waterac = $('#waterac').val();
var elecac = $('#elecac').val();
var housestatus = $('#housestatus').val();
var tenant = $('#tenant').val();

		
		if(property==''||roomno==''||rescom==''||roomtype==''||location==''||rent==''){
		swal("Error", "Make sure you enter all the required fields!", "error");
		return;
		}

		else if(a==3){

			swal({
			  title: "Are you sure?",
			  text: "The Unit will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete it!",
			  closeOnConfirm: false
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:14,property:property,housestatus:housestatus,tenant:tenant,roomno:roomno,floorspace:floorspace,rescom:rescom,roomtype:roomtype,location:location,rent:rent,watermeter:watermeter,waterprev:waterprev,elecmeter:elecmeter,elecprev:elecprev,remarks:remarks,a:a,b:b,elecmeterserial:elecmeterserial,elecmaxload:elecmaxload,waterac:waterac,elecac:elecac},
				success:function(data){
				$('#message').html(data);
				}
				});	
			  
			});

		}
		
		
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:14,property:property,housestatus:housestatus,tenant:tenant,roomno:roomno,floorspace:floorspace,rescom:rescom,roomtype:roomtype,location:location,rent:rent,watermeter:watermeter,waterprev:waterprev,elecmeter:elecmeter,elecprev:elecprev,remarks:remarks,a:a,b:b,elecmeterserial:elecmeterserial,elecmaxload:elecmaxload,waterac:waterac,elecac:elecac},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}



function savemeterinfo(a){
var metertype = $('#metertype').val();
var meterno = $('#meterno').val();
var meteracno = $('#meteracno').val();
var curread = $('#curread').val();


		
if(meterno==''||curread==''||metertype==''||meteracno==''){
swal("Error", "Make sure you enter all the required fields!", "error");
return;
}

	
		else{
		$('#cartmeters').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:39.1,curread:curread,a:a,meteracno:meteracno,metertype:metertype,meterno:meterno},
		success:function(data){
		$('#cartmeters').html(data);
		 $('#meterno').val(''); $('#metertype').val(''); $('#curread').val(''); $('#meteracno').val('');
		}
		});	
		}	
}


function savemeter(a){
var metertype = $('#metertype'+a).val();
var meterno = $('#meterno'+a).val();
var meteracno = $('#meteracno'+a).val();
var curread = $('#curread'+a).val();


		
if(meterno==''||curread==''||metertype==''||meteracno==''){
swal("Error", "Make sure you enter all the required fields!", "error");
return;
}

	
		else{
		$('#save'+a).html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:39.2,curread:curread,a:a,meteracno:meteracno,metertype:metertype,meterno:meterno},
		success:function(data){
		$('#cartmeters').html(data);
		}
		});	
		}	
}


function delmeter(a){
$('#del' + a).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:'39.3',a:a},
	success:function(data){
	$('#cartmeters').html(data);
	}
	});	
}





function deletestate(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:178},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function deleteunit(code){
	swal({
			  title: "Are you sure?",
			  text: "The Unit will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete it!",
			  closeOnConfirm: false
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:14.1,code:code},
				success:function(data){
				swal("Removed!", "The Item has been removed.", "success");
				$('#message').html(data);
				}
				});
			  
			});
}

function deletelandstate(code){
	swal({
			  title: "Are you sure?",
			  text: "The Statement will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete it!",
			  closeOnConfirm: false
			},
			function(){
				$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:81,code:code},
				success:function(data){
				swal("Removed!", "The Statement has been removed.", "success");
				$('#message').html(data);
				}
				});
			  
			});
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



function saveinspection(code,a){

	var checkin = $('#checkin'+code).val();
	var checkout =  $('#checkout'+code).val();
	
	
		$('#save'+code).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:93,code:code,checkin:checkin,checkout:checkout,a:a},
		success:function(data){
		$('#save'+code).html(data);
		}
		});	
		
}

function deleteinspection(code){
$('#delete' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
$.ajax({
	url:'data.php',
	data:{id:94,code:code},
	success:function(data){
	$('#normal'+code).html('');
	}
	});	
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
var len=parts.length;
var actid = parts[0];
var actname = parts[1];
var quat = $('#qty').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var price = $('#price').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var notes = $('#notes').val();
var statementstatus = $('input[name=statementstatus]:checked').val();
if(statementstatus!=1){statementstatus=0}
var commstatus = $('input[name=commstatus]:checked').val();
if(commstatus!=1){commstatus=0}



if(tid==''){
	swal("Error", "Select a Tenant!", "error");	
}
else if(month==''){
swal("Error", "Select the Month!", "error");
}
else if(actid==''||parseInt(len,10)<2){
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
		data:{id:49.2,tid:tid,tname:tname,roomno:roomno,month:month,actid:actid,actname:actname,quat:quat,price:price,total:total,notes:notes,commstatus:commstatus,statementstatus:statementstatus},
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
	var bal=$('#bal' + code).html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(paying==''||paying==0){
		swal("Error", "Amount Paid Cannot be zero!", "error");
		//e.preventDefault();
		}

	else if(parseFloat(paying,10)>parseFloat(bal,10)){
	swal("Error", "Amount Paid Cannot be more than balance pending!", "error");
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
swal("Error", "No Tenant Selected!", "error");
}

else if(pid==''){
swal("Error", "Select Mode of Payment!", "error");
}

else if(date==''){
swal("Error", "Enter the Banking Date!", "error");
}
else if(refno==''&&pid!=625){
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

function submitwaterbill(){

	$('#postwater').hide();
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
if(lid==741){subid=$('#employee').val();}
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

else if(lid==741&&subid==''){
	swal("Error", "Select the Employee!", "error");
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
	var ledgercode=$('#ledgercode' + code).val();
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
	var code=$('#codeledger').val();
	if(ledger==''||cat==''||code==''){
	swal("Error", "All the fields are required!", "error");	
	}
	else{	
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:27,ledger:ledger,cat:cat,code:code},
	success:function(data){
	$('#message').html(data);
	
	}
	});
	}
}


function addnewescalation(tid){
	var start=$('#date1').val();
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var end=$('#date2').val();
	if(start==''||end==''||amount==''){
	swal("Error", "All the fields are required!", "error");	
	}
	else{

	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:12.1,end:end,start:start,amount:amount,tid:tid},
	success:function(data){
	$(".close").click();
	$(".modal-backdrop").remove();
	$('#message').html(data);
	
	}
	});
	}
}

function deleteescalation(code){
	swal({
			  title: "Are you sure?",
			  text: "The Entry will be deleted!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Delete it!",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:12.2,code:code},
				success:function(data){
				swal("Removed!", "The Record has been removed.", "success");
				$("#normal"+code).hide();
				}
				});
			  
			});
}

function loadescalation(param){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:25%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'33',param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function expman(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:25%; left:50%" alt="Loading"/>');
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
	var rate=$('#waterrate').val();
	var w = diff * rate;
	var s = 0;
	var sc = 0;
	var tot = w + s+ sc;
	w=(w).formatMoney(2, '.', ',');
	s=(s).formatMoney(2, '.', ',');
	sc=(sc).formatMoney(2, '.', ',');
	//s=(s).formatMoney(2, '.', ',');
	var sum=parseFloat(s.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10)+parseFloat(w.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10)+parseFloat(sc.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);

	tot=(tot).formatMoney(2, '.', ',');
	var toilet=$('#toilet').val();
	if(toilet==''){toilet=0}
	var st=parseFloat(toilet,10)+parseFloat(sum,10)
	$('#sumtotal2').val(st);
	
	$('#watertotal').val(tot);
	$('#water').val(w);
	$('#sewer').val(s);
	$('#service').val(sc);
	$('#sumtotal').val(sum);
	
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

$('#toilet').keyup(function() {
	var toilet = $(this).val();
	if(toilet==''){toilet=0}
	var st=$('#sumtotal').val();	 
	var tot=parseInt(st,10) + parseInt(toilet,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#sumtotal2').val(tot);
	});

function addwater(){
	var wp=$('#waterprev').val();
	var wc=$('#watercurr').val();
	var wd=$('#waterdiff').val();
	var total=$('#watertotal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	
	
	var water=$('#water').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var sewer=$('#sewer').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var service=$('#service').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var meter=$('#meterb').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var cons=$('#conservancy').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var sum=$('#sumtotal2').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var toilet=$('#toilet').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(toilet==''){toilet=0}
	var mon=$('#month').val();
	var dateread=$('#date').val();
	var mtrno=$('#meter').val();
	
	
	var param = $('#units').val();
    var parts=param.split('-',3);
    rid=$('#rid').val();


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
	data:{id:33,rid:rid,mtrno:mtrno,mon:mon,fromdep:fromdep,dateread:dateread,wp:wp,wc:wc,wd:wd,water:water,sewer:sewer,service:service,meter:meter,sum:sum,cons:cons,toilet:toilet},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}

function waterupload(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'143.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
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
    rid=$('#rid').val();

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

var acno = $('#acno').val();
var bankname = $('#bankname').val();
var branchname = $('#branchname').val();

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
		data:{id:38,cname:cname,tel:tel,add:add,add:add,web:web,email:email,motto:motto,loc:loc,pin:pin,etrno:etrno,acno:acno,bankname:bankname,branchname:branchname},
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
var fid = $('#fid1').val();


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
		data:{id:39,user:user,name:name,pos:pos,pass:pass,dept:dept,branch:branch,fid:fid},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function changeuser(){
	var str = $('#usercombo').val();
	 var parts=str.split('θ',6);
	 $('#user2').val(parts[0]);
	 $('#pos2').val(parts[1]);
	 $('#fname2').val(parts[2]);
	 $('#dep2').val(parts[3]);
	 $('#branch2').val(parts[4]);

	 
	 if(parts[1]=='FieldPerson'){
		$('#groupdiv2').show();
		$('#fid2').val(parts[5]);
	 }
	 else{
	 	$('#groupdiv2').hide();
	 }


}

function edituser(){
var user = $('#user2').val();
var dept = $('#dep2').val();
var pos = $('#pos2').val();
var fname = $('#fname2').val();
var branch = $('#branch2').val();
var fid = $('#fid2').val();
var rec = $('input[name=respas]:checked').val();
if(rec!=1){rec=0}

		if(user==''||dept==''||pos==''||fname==''||branch==''){
		swal("Error", "All fields are mandatory!", "error");
		}

		else{
		$("#message2").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:40,user:user,pos:pos,dept:dept,fname:fname,branch:branch,rec:rec,fid:fid},
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
	swal("Error", "You cannot archive the Admin User!", "error");
	}
	else{

		//delete soi
			swal({
			  title: "Are you sure?",
			  text: "This user will be archived!",
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
				swal("Removed!", "The User has been archived.", "success");
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
	var groupid=$('#groupid').val();
	if(sysvar==''){
	swal("Error", "Select a category!", "error");
	}
	else if(vname==''){
	swal("Error", "Enter the variable name!", "error");
	}
	else if(sysvar=='fieldperson'&&groupid==''){
	swal("Error", "Select the Group name!", "error");
	}
		
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:44,sysvar:sysvar,vname:vname,groupid:groupid},
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


	 if(b=='fieldperson'){
	 	$('#groupdiv2').show();
	 }else{
	 	$('#groupdiv2').hide();
	 }
	 
}

function selectgroup(){
	 var param = $('#sysvar').val();
	 if(param=='fieldperson'){
	 	$('#groupdiv').show();
	 }else{
	 	$('#groupdiv').hide();
	 }
	 
}

function selectusergroup(){
	 var param = $('#pos1').val();
	 if(param=='FieldPerson'){
	 	$('#groupdiv').show();
	 }else{
	 	$('#groupdiv').hide();
	 }
	 
}

function selectusergroup2(){
	 var param = $('#pos2').val();
	 if(param=='FieldPerson'){
	 	$('#groupdiv2').show();
	 }else{
	 	$('#groupdiv2').hide();
	 }
	 
}




function setvar(c){
	var str = $('#syscat'+c).val();
	 var parts=str.split('$',2);
	 var a=parts[0];
	 var b=parts[1];


	 if(c==8){
	 
	 	 var parts=b.split('#',2);
		 var b=parts[0];
		 var group=parts[1];
		 $('#groupid2').val(group);
	 }

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
	var groupid=$('#groupid2').val();
	
	if(sysvar==''){
	swal("Error", "Select a category!", "error");
	}
	else if(vname==''){
	swal("Error", "Enter the variable name!", "error");
	}

	else if(sysvar=='fieldperson'&&groupid==''){
	swal("Error", "Select the Group name!", "error");
	}
		
	else{
	$("#message2").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:45,sysvar:sysvar,vname:vname,bid:bid,groupid:groupid},
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
var name2 = $('#itemname2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else if(name==''&&a!=1){
		swal("Error", "Select the "+tit, "error");
}
else if(name2==''&&a==4){
		swal("Error", "Select the Property", "error");
}
else if(view==1){
window.open("report.php?id=12&name=" + name  + '&' +  "\ncode=" + a + '&' + "\nname2=" + name2);
}
else {window.open("report.php?id=12&name=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + a + '&' + "\nname2=" + name2);}
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
var name2 = $('#itemname2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else if(name==''&&a!=1){
		swal("Error", "Select the "+tit, "error");
}
else if(name2==''&&a==4){
		swal("Error", "Select the Property", "error");
}
else if(view==1){
window.open("report.php?id=13&name=" + name  + '&' +  "\ncode=" + a + '&' + "\nname2=" + name2);
}
else {window.open("report.php?id=13&name=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + a + '&' + "\nname2=" + name2);}
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



function creditreport(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:73.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entercreditreport(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=12.1&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}


function refundsreport(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:73.2},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterrefundsreport(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=12.2&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
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
var code=1;
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=15&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + code);}
}

function summrecuser(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:74.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersummrecuser(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var code=2;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=15&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + code + '&' + "\nname=" + name);}
}


function summrecpay(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:74.2},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersummrecpay(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var code=3;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=15&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + code + '&' + "\nname=" + name);}
}


function invvsrep(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:75,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterinvvsrep(a){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var month = $('#month').val();
var property = $('#property').val();
var view = $('input[name=viewall]:checked').val();
var type = $('input[name=format]:checked').val();
if(!(view)){view=0}

var balonly = $('input[name=balonly]:checked').val();
if(!(balonly)){balonly=0}


if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id="+type + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nproperty=" + property + '&' + "\nmonth=" + month + '&' + "\nbalonly=" + balonly + '&' + "\ncode=" + a);}
}


function invvsrep7(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:75.4,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterinvvsrep7(a){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var month = $('#month').val();
var fid = $('#fid').val();
var view = $('input[name=viewall]:checked').val();
var type = $('input[name=format]:checked').val();
if(!(view)){view=0}

var balonly = $('input[name=balonly]:checked').val();
if(!(balonly)){balonly=0}


if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id="+type + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nfid=" + fid + '&' + "\nmonth=" + month + '&' + "\nbalonly=" + balonly + '&' + "\ncode=" + a);}
}


function invvsrep8(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:75.5,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterinvvsrep8(a){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var month = $('#month').val();
var fid = $('#fid').val();
var view = $('input[name=viewall]:checked').val();
var type = $('input[name=format]:checked').val();
if(!(view)){view=0}

var balonly = $('input[name=balonly]:checked').val();
if(!(balonly)){balonly=0}


if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id="+type + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nfid=" + fid + '&' + "\nmonth=" + month + '&' + "\nbalonly=" + balonly + '&' + "\ncode=" + a);}
}


function invvsrep2(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:75.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterinvvsrep2(){
var d2 = $('#date2').val();
var name = $('#itemname').val();
var property = $('#property').val();
if(d2==''){
		swal("Error", "Enter the End Date!", "error");
}
else {window.open("report.php?id=61&" + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nproperty=" + property);}
}

function invvsrep3(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:75.2},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterinvvsrep3(){
var d2 = $('#month').val();
var name = $('#itemname').val();
if(d2==''){
		swal("Error", "Enter the End Date!", "error");
}
else {window.open("report.php?id=69&" + "\nd2=" + d2 + '&' + "\nname=" + name);}
}

function invvsrep4(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:75.3},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterinvvsrep4(){
var d2 = $('#month').val();
if(d2==''){
		swal("Error", "Enter the End Date!", "error");
}
else {window.open("report.php?id=70&" + "\nd2=" + d2);}
}

function opentenrep(out,rcptno){
	window.open("report.php?" + "\nid=" + out + '&' + "\nrcptno=" + rcptno);
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

function tenrep1(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:77},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenrep1(){
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


function tenrep4(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:78.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenrep4(){
var code=3;
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
window.open("report.php?id=18&" + "\nname=" + name + '&' + "\ncode=" + code);
}


function tenrep5(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:78.2},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenrep5(){
var code=4;
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
window.open("report.php?id=18&" + "\nname=" + name + '&' + "\ncode=" + code);
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


function tenrep6(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:78.3},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenrep6(){
var code=5;
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
window.open("report.php?id=18&" + "\nname=" + name + '&' + "\ncode=" + code);
}



function tenrep7(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:78.4},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertenrep7(){
var code=6;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Sales Person!", "error");
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
var name2 = $('#itemname2').val();
var code=4;
if(name==''){
	swal("Error", "Select the Property!", "error");
}
else {window.open("report.php?id=29&" + "\ncode=" + code + '&' + "\nname=" + name + '&' + "\nname2=" + name2);}
}


function unitsbyfield(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:88.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterunitsbyfield(){
var name = $('#itemname').val();
var name2 = $('#itemname2').val();
var code=5;
if(name==''){
	swal("Error", "Select the Property!", "error");
}
else {window.open("report.php?id=29&" + "\ncode=" + code + '&' + "\nname=" + name + '&' + "\nname2=" + name2);}
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
var type = $('input[name=format]:checked').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}

if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Tenant!", "error");
}

else {window.open("report.php?id=" + type + "&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
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

function landmonstate(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:96.1},
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

function enterlandmonstate(){
var d1 = $('#date1').val();
var str = $('#itemname').val();
var parts=str.split('-',2);
var name=parts[0];
var code = $('input[name=format]:checked').val();
if(d1==''){
		swal("Error", "Enter the Start and End Dates!", "error");
}

else if(name==''){
	swal("Error", "Select the Property!", "error");
}

else {window.open("report.php?id=63&" + "\nd1=" + d1 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
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

function supinvoicesprop(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:115.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersupinvoicesprop(){
var code=4;
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

else {window.open("report.php?id=48&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code);}
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
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:98},
	success:function(data){
	$('#display').html(data);
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
var name = $('#itemname').val();
var code=1;
if(mon==''){
		swal("Error", "Select the Month!", "error");
}
else {window.open("report.php?id=42&" + "\nmon=" + mon + '&' + "\nname=" + name);}
}


function unpaidwater(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:104.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterunpaidwater(){
var mon = $('#month').val();
var code=1;
if(mon==''){
		swal("Error", "Select the Month!", "error");
}
else {window.open("report.php?id=68&" + "\nmon=" + mon);}
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
	var reminder  = $('#reminder').val(); 

	if(date==''||name==''){
		swal("Error", "The Event, Date and Time fields are required.!", "error");
		return;
	}
	else{

	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:58,name:name,date:date,reminder:reminder},
	success:function(data){
	$('#message').html(data);
	}
	});

	}
}

function addnewsms(){
	var tot  = $('#totitems').val(); 
	var message  = $('#textmessage').val();
	var checksms = $('input[name=checksms]:checked').val();
	var checknotif = $('input[name=checknotif]:checked').val();
	var checkemail = $('input[name=checkemail]:checked').val();
	if(checksms!=1){checksms=0;}if(checknotif!=1){checknotif=0;}if(checkemail!=1){checkemail=0;}
	var all=checksms+checkemail+checknotif;
	
	if(tot==''||tot==0){
		swal("Error", "Enter at least one recipient", "error");
		return;
	}
	else if(message==''){
		swal("Error", "Enter the message", "error");
		return;
	}
	else if(all==''||all==0){
		swal("Error", "Check at least one message channel", "error");
		return;
	}
	else{

	$("#loader").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:62,checksms:checksms,checknotif:checknotif,checkemail:checkemail,message:message},
	success:function(data){
	$('#loader').html(data);
	}
	});

	}
}

function removerecep(eid){
	$.ajax({
	url:'bridge.php',
	data:{id:1.3,eid:eid},
	success:function(data){
		$('#recipdiv').html(data);
	}
	});
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
	var servicecharge  = $('#servicecharge').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	//OTHER VARIABLES
	var rescom = $('#rescom').val();
	var vatstatus = $('input[name=vatstatus]:checked').val();
	if(vatstatus!=1){vatstatus=0}
	var penpercent = $('#penpercent').val();
	var pendate = $('#pendate').val();
	var penstatus = $('input[name=penstatus]:checked').val();
	if(penstatus!=1){penstatus=0}
	

	if(bname==''||address==''||chequename==''||rid==''||location==''||years==''||months==''||monrent==''||payabledate==''||utildep==''||depmonths==''||escper==''||escint==''||fitperiod==''||lawyer==''||usage==''||commencedate==''||depmonthscurrent==''||payment==''){
		swal("Error", "All fields are required.!", "error");
		return;
	}
	else{

	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:61,lof:lof,bname:bname,address:address,chequename:chequename,rid:rid,roomno:roomno,location:location,years:years,months:months,monrent:monrent,payabledate:payabledate,escper:escper,escint:escint,fitperiod:fitperiod,lawyer:lawyer,usage:usage,utildep:utildep,depmonths:depmonths,commencedate:commencedate,depmonthscurrent:depmonthscurrent,payment:payment,servicecharge:servicecharge,penstatus:penstatus,pendate:pendate,penpercent:penpercent,vatstatus:vatstatus,rescom:rescom},
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


function archivedtenants(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:135.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterarchivedtenants(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=54.1&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}



function creditnote(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:138},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function checkpayingcred(pid){

var paying=$('#paying'+pid).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var bal=$('#bal'+pid).html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		
		if(parseFloat(bal,10)<parseFloat(paying,10)){
		swal("Error", "Amount being Credited Cannot be more than Invoice Entry Amount!", "error");
		$('#paying'+pid).val('').focus();
		//e.preventDefault();
		}
		
}


function savecreditnote(code){	
	var paying=$('#paying' + code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(paying==''||paying==0){
		swal("Error", "Amount Credited Cannot be zero!", "error");
		//e.preventDefault();
		}
		
	else{

	$('#save' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:138.2,code:code,paying:paying},
	success:function(data){
	$('#save' + code).html(data);
	$("#invoiceno").prop("disabled",true);
	},
	
	});

	}
}



function submitcreditnote(){
var fintot = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var refno =  $('#refno').val();
var date =  $('#bankdate').val();
var param = $('#invoiceno').val();
var parts=param.split('-',3);
invoiceno=parts[0];



if(fintot==''){
swal("Error", "No Entries Made!", "error");
}	
else if(invoiceno==''){
swal("Error", "No Invoice Selected!", "error");
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
data:{id:67,fintot:fintot,invoiceno:invoiceno,refno:refno,date:date},
success:function(data){
$('#display').html(data);
}
});	
}	
}

function billables(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:139},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function savebillitem(code){

	var name = $('#name'+ code).val();
	var price = $('#price'+ code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var vat = $('#vat'+ code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var lid =  $('#account'+ code).val();
	var lname=$('#account'+ code +' option:selected').text();
	
	if(name==''||price==''||lid==''){
	swal("Error", "Item name,Account and price are mandatory fields!", "error");
	}	
	else{
		
		$('#save'+ code).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:68,code:code,name:name,price:price,lid:lid,lname:lname,vat:vat},
		success:function(data){
		$('#save'+ code).html(data);
		}
		});	
		}	
}

function delbillitem(code){

	if(code==1||code==4||code==12){
			swal("Error", "Default System Item.It cannot be deleted!", "error");
			return;
	}
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
				data:{id:69,code:code},
				success:function(data){
				swal("Removed!", "The Item has been removed.", "success");
				$("#normal"+code).hide();
				}
				});
			  
			});
}

function addnewbillitem(){

	var name = $('#nitem').val();
	var price = $('#nprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var vat = $('#nvat').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var lid =  $('#naccount').val();
	var lname=$('#naccount option:selected').text();
	
	if(name==''||price==''||lid==''){
	swal("Error", "Item name,Account and price are mandatory fields!", "error");
	}	
	else{
		
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:70,name:name,price:price,lid:lid,lname:lname,vat:vat},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function commrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.1},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entercommrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Start and End Months!", "error");
}
else {window.open("report.php?id=56&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}


function taxrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.5},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertaxrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Start and End Months!", "error");
}
else {window.open("report.php?id=65&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}



function taxrep2(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.7},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertaxrep2(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Start and End Months!", "error");
}
else {window.open("report.php?id=85&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}

function calcchange(){

	var fintot  = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var paying  = $('#ampaying').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var paybal=parseFloat(paying,10)-parseFloat(fintot,10);
	paybal=(paybal).formatMoney(2, '.', ',');
	$('#paybal').val(paybal);

}

function multipleinvoicing(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:140},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savemulinvoice(code){	
	var amount=$('#amount' + code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(amount==''||amount==0){
		swal("Error", "Amount Cannot be zero!", "error");
		//e.preventDefault();
		}
		
	else{

	$('#save' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:140.1,code:code,amount:amount},
	success:function(data){
	$('#save' + code).html(data);
	},
	
	});

	}
}

function delmulinvoice(code){
$('#del' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:20px" alt="Loading"/>');
$.ajax({
	url:'bridge.php',
	data:{id:'140.2',code:code},
	success:function(data){
	$('#del' + code).html(data);
	}
	});	
}


function submitmulinvoice(){
var property =  $('#property').val();
var month =  $('#month').val();
var totitems =  $('#totitems').val();
var fintot =  $('#totprice').val();
var date =  $('#date').val();


if(fintot==''){
swal("Error", "No Entries Made!", "error");
}	
else if(property==''){
swal("Error", "No Property Selected!", "error");
}

else if(month==''){
swal("Error", "Select the Month!", "error");
}

else if(date==''){
swal("Error", "Enter the Date!", "error");
}


else{
$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:71,fintot:fintot,month:month,property:property,date:date},
success:function(data){
$('#display').html(data);
}
});	
}	
}


//updates


function closingrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.2},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterclosingrep(){
var d1 = $('#date1').val();
if(d1==''){
		swal("Error", "Enter the Date!", "error");
}
else {window.open("report.php?id=57&" + "\nd1=" + d1);}
}

function expsumm(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.4},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterexpsumm(){
var d1 = $('#date1').val();
if(d1==''){
		swal("Error", "Enter the Month!", "error");
}
else {window.open("report.php?id=59&" + "\nd1=" + d1);}
}

function exprep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.3},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterexprep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=58&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}


function empadvance(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.8},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterempadvance(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=87&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function checkout1(a){
var vacate = $('#datepicker-normal').val();
var notice = $('#datepicker-normal2').val();


	if(vacate==''||notice==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}


	else{
	$('#message1').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:72,vacate:vacate,notice:notice,param:a},
	success:function(data){
	$('#message1').html(data);
	}
	});	
	}	

}

function checkout2(a){
var remarks = $('#wysiwyghtml').val();


	if(remarks==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}


	else{
	$('#message2').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:73,remarks:remarks,param:a},
	success:function(data){
	$('#message2').html(data);
	}
	});	
	}	

}

function checkout3(a){
var categ = $('#dedcateg').val();
var paymode = $('#paymodededuct').val();
var remarks = $('#dedremarks').val();
var amount = $('#dedamount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');


	if(categ==''||amount==''||remarks==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}


	else{
	$('#message3').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:74,remarks:remarks,param:a,amount:amount,categ:categ,paymode:paymode},
	success:function(data){
	$('#message3').html(data);
	}
	});	
	}	

}

function deductiondetails(a){

	$('#deddiv').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:25.1,param:a},
	success:function(data){
	$('#deddiv').html(data);
	}
	});	

}


function savededuction(a){
var categ = $('#categded'+a).val();
var remarks = $('#remarksded'+a).val();
var amount = $('#amountded'+a).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');


	if(categ==''||amount==''||remarks==''){
	swal("Error", "Make sure you enter all the required fields!", "error");
	return;
	}


	else{
	$('#save'+a).html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:75,remarks:remarks,param:a,amount:amount,categ:categ},
	success:function(data){
	$('#save'+a).html(data);
	}
	});	
	}	

}

function deldeduction(code){
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
				data:{id:76,code:code},
				success:function(data){
				swal("Removed!", "The Item has been removed.", "success");
				$("#normal"+code).hide();
				}
				});
			  
			});
}



function refunds(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:141},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function checkpayingrefund(pid){

var paying=$('#paying'+pid).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var bal=$('#bal'+pid).html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		
		if(parseFloat(bal,10)<parseFloat(paying,10)){
		swal("Error", "Amount being Credited Cannot be more than Invoice Entry Amount!", "error");
		$('#paying'+pid).val('').focus();
		//e.preventDefault();
		}
		
}


function saverefund(code){	
	var paying=$('#paying' + code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(paying==''||paying==0){
	swal("Error", "Amount Credited Cannot be zero!", "error");
	//e.preventDefault();
	}
		
	else{

	$('#save' + code).html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:141.2,code:code,paying:paying},
	success:function(data){
	$('#save' + code).html(data);
	$("#receiptno").prop("disabled",true);
	},
	
	});

	}
}



function submitrefund(){
var fintot = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var refno =  $('#refno').val();
var date =  $('#bankdate').val();
var param = $('#receiptno').val();
var paymode = $('#paymode').val();
var parts=param.split('-',3);
receiptno=parts[0];


/*
if(fintot==''){
swal("Error", "No Entries Made!", "error");
}	
else 
*/
if(receiptno==''){
swal("Error", "No Invoice Selected!", "error");
}
else if(paymode==''){
swal("Error", "No Payment Mode Selected!", "error");
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
data:{id:77,fintot:fintot,receiptno:receiptno,refno:refno,date:date,paymode:paymode},
success:function(data){
$('#display').html(data);
}
});	
}	
}


function linkup1(){

	var key =  $('#thekey').val();
	$("#keyresponse").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:142,key:key},
	success:function(data){
	$('#keyresponse').html(data);
	}
	});

}

function linkup2(){

	var key =  $('#thekey').val();
	$("#keyresponse").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:143,key:key},
	success:function(data){
	$('#keyresponse').html(data);
	}
	});

}

function linkup3(str){

	var parts=str.split('-',3);
	keyy=parts[0];
	id=parts[1];
	param=parts[2];

	
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:id,param:param,keyy:keyy},
	success:function(data){
	$('#mainp').html(data);
	}
	});

}


function renewcontract(param){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:31,param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function actrescom(){
var rescom =  $('#rescom').val();
if(rescom=='Commercial'){

	$('#commdiv').show();
	$('#years').val(5);$('#months').val(3);
	$('input[name=openlease]').attr('checked', false);

}else{

	$('#commdiv').hide();
	$('#years').val(99);$('#months').val(0);
	$('input[name=openlease]').attr('checked', true);

}

}

function landfile(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:146},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function landpayby(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:96.2},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function enterlandpayby(code){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var name2 = $('#itemname2').val();
if(d1==''||d2==''){
	swal("Error", "Select the Dates!", "error");
}

else {window.open("report.php?id=64&" + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ncode=" + code + '&' + "\nname2=" + name2 );}
}


function landpayby2(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:96.4},
	success:function(data){
	$('#display').html(data);
	}
	});	
}




function landstategen(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:147},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterlandstategen(){
	var property = $('#property').val();
	var month = $('#month').val();
	param=property +'#'+ month;
	if(property==''||month==''){
		swal("Error", "Select the required Fields!", "error");
		return;
	}

	else {


	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:148,param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});

	}
}


function enterdeleteland(){
	var month = $('#month').val();
	if(month==''){
		swal("Error", "Select the month!", "error");
		return;
	}

	else {


	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:150,mon:month},
	success:function(data){
	$('#mainp').html(data);
	}
	});

	}
}


function savelandtx(hid){
	var type=$('#type').val();
	var mon=$('#month').val();
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var desc=$('#desc').val();
	var itname = $('#itemname').val();
	var itcode=0;
	var commisionable = $('input[name=commisionable]:checked').val();
	if(commisionable!=1){commisionable=0}
	
	if(itname==''||amount==''||desc==''){
		swal("Error", "All the fields are required!", "error");
	}
	
	else{
	$("#message").html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:'78',itcode:itcode,itname:itname,amount:amount,desc:desc,type:type,hid:hid,mon:mon,commisionable:commisionable},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
}


function loadlandstate(hid){
	var mon=$('#month').val();
	var hid=$('#hid').val();
	$("#landstate").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:149,hid:hid,mon:mon},
	success:function(data){
	$('#landstate').html(data);
	}
	});
}


function deletelandtx(code){

			swal({
			  title: "Are you sure?",
			  text: "The entry will be removed from the landlord transactions!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Remove it!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:79,code:code},
				success:function(data){
				swal("Removed!", "The Entry has been removed.", "success");
				loadlandstate();
				}
				});
			  
			});



}

function submitlandstate(){
var mon=$('#month').val();
var hid=$('#hid').val();
var pid =  $('#paymode').val();
var pname=$('#paymode option:selected').text();
var refno =  $('#refno').val();
var date =  $('#bankdate').val();
var gross=$('#gross').html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var comm=$('#comm').html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var net=$('#net').html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var vat=$('#vat').html().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

if(pid==''){
swal("Error", "Select Mode of Payment!", "error");
}

else if(date==''){
swal("Error", "Enter the Banking Date!", "error");
}
else if(refno==''&&pid!=625){
swal("Error", "Enter the reference No!", "error");
}

else{
$('#receivefee').hide();
$('#landstate').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:80,pid:pid,pname:pname,refno:refno,date:date,hid:hid,mon:mon,vat:vat,net:net,comm:comm,gross:gross},
success:function(data){
$('#landstate').html(data);
}
});	
}	
}

function landtxrep(a){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:96.3,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function enterlandtxrep(a){
code=1;
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else if(view==1){
window.open("report.php?id=66&name=" + name  + '&' +  "\ncode=" + a);
}
else {window.open("report.php?id=66&name=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=" + a);}
}


function quicksms(){
	var phone  = $('#phone3').val(); 
	var message  = $('#message3').val(); 
	
	if(phone==''||message==''){
		swal("Error", "All fields are required", "error");
		return;
	}
	else{

	$("#loader3").html('<img id="img-spinner" src="img/spin.gif" style="" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:62.1,phone:phone,message:message},
	success:function(data){
	$('#loader3').html(data);
	}
	});

	}
}

function notifybalances(){

			swal({
			  title: "Are you sure?",
			  text: "Messages will be sent to all Tenants with Balances!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Proceed!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:62.2},
				success:function(data){
				swal("Sent!", "All tenants with balances notified!", "success");
				}
				});
			  
			});
}


//sacco module

function loancalc(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:151},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function calculateloan(){
	
	var loan=$('#loan').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var interest=$('#interest').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var years=$('#years').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var mode=$('#mode').val();
	

	if(loan==''||interest==''||years==''||mode==''){
		swal("Error", "All fields are required", "error");
		return;
	}
	
	else{
	$("#display").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:152,loan:loan,interest:interest,years:years,mode:mode},
	success:function(data){
	$('#display').html(data);
	}
	});
	}
	
}

function exportloan(){

	window.open("report.php?id=72");
}

function gotoloan(){
	var loan=$('#loan').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var interest=$('#interest').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var years=$('#years').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var mode=$('#mode').val();
	

	if(loan==''||interest==''||years==''){
		swal("Error", "All fields are required", "error");
		return;
	}
	
	else{
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:153,loan:loan,interest:interest,years:years,mode:mode},
	success:function(data){
	$('#mainp').html(data);
	}
	});

	}
}

function poploan(){


	var amount=$('#loanamount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	$('#amounta').val((parseFloat(amount)).formatMoney(2, '.', ','));
		
}


function newloan(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:153},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function addnewloan(){
var hid =  $('#property').val();
var hname=$('#property option:selected').text();
var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var interest=$('#interest').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var loanpurpose=$('#loanpurpose').val();
var months=$('#months').val();
var date=$('#date').val();
var refno=$('#refno').val();
var guarrantor=$('#guarrantor').val();
var security =  $('#security').val();
var otherdetails =  $('#otherdetails').val();
var mode=$('#mode').val();


if(hid==''||amount==''||interest==''||months==''||mode==''){
swal("Error", "Fill all the required fields!", "error");
return;
}

else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute;" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:82,hid:hid,hname:hname,amount:amount,date:date,interest:interest,loanpurpose:loanpurpose,months:months,guarrantor:guarrantor,security:security,otherdetails:otherdetails,refno:refno,mode:mode},
success:function(data){
$('#message').html(data);
}
});	
}	
}

function editloan(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:154},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function editnewloan(param){
var hid =  $('#property').val();
var hname=$('#property option:selected').text();
var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var interest=$('#interest').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var loanpurpose=$('#loanpurpose').val();
var months=$('#months').val();
var date=$('#date').val();
var refno=$('#refno').val();
var guarrantor=$('#guarrantor').val();
var security =  $('#security').val();
var otherdetails =  $('#otherdetails').val();
var mode=$('#mode').val();


if(hid==''||amount==''||interest==''||months==''||mode==''){
swal("Error", "Fill all the required fields!", "error");
return;
}

else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute;" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:83,param:param,hid:hid,hname:hname,amount:amount,date:date,interest:interest,loanpurpose:loanpurpose,months:months,guarrantor:guarrantor,security:security,otherdetails:otherdetails,refno:refno,mode:mode},
success:function(data){
$('#message').html(data);
}
});	
}	
}


function deleteloan(param){

			swal({
			  title: "Are you sure?",
			  text: "The loan appplication will be removed from the records!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Remove it!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:84,param:param},
				success:function(data){
				swal("Removed!", "The Entry has been removed.", "success");
				editloan();
				}
				});
			  
			});

}

function verifyloan(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:156},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function verifynewloan(param,a){

			if(a==1){mess='approved';}else {mess='rejected';}
			swal({
			  title: "Are you sure?",
			  text: "The loan appplication will be "+ mess +"!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:85,param:param,a:a},
				success:function(data){
				$('#message').html(data);
				}
				});
			  
			});

}

function findloan(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:158},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function loanchart(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:159},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function loanrepay(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:161},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function checkloanam(){

	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	
		if(amount==''||amount==null){
			amount=0;
		}
		var normbal=$('#normacbal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		var loanbal=$('#loanacbal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

		var bal1=parseFloat(normbal)-parseFloat(amount);
		var bal2=parseFloat(loanbal)-parseFloat(amount);


		if(bal1<0){
				$('#amount').val(0);
				$('#amounta').val('');
				swal("Error", "Normal Account Balance cannot be less than zero after transaction!", "error");
				return;	
		}
		if(bal2<0){
				$('#amount').val(0);
				$('#amounta').val('');
				swal("Error", "Loan Balance cannot be less than zero after transaction!", "error");
				return;	
		}

		$('#amounta').val((parseFloat(amount)).formatMoney(2, '.', ','));
		
}

function submitloantrans(){
	
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var details=$('#details').val();
	var loanacno=$('#loanacno').val();
	var date=$('#date').val();
	if(amount==''||amount==0){
		swal("Error", "Fill the Amount field!", "error");
		return;
	}
	
	else if(details==''){
		swal("Error", "Enter the explanation details for the transaction!", "error");
		return;	
	}
	else if(date==''){
		swal("Error", "Enter the Transaction Date!", "error");
		return;	
	}

	else{
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:86,amount:amount,details:details,loanacno:loanacno,date:date},
	success:function(data){
	$('#message').html(data);
	}
	});
	}
	
}

function cashdep(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:163},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function cashdeposit(){
	/*Account Details*/
	var amount=$('#depamount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var date=$('#date').val();
	var odetail=$('#details').val();
	var acno=$('#acno').val();
	
	if(amount==''||amount==0){
	swal("Error", "Amount Deposited cannot be zero!", "error");
	return;
	}

	else if(odetail==''){
		swal("Error", "Enter the explanation details for the transaction!", "error");
		return;	
	}
	else if(date==''){
		swal("Error", "Enter the Transaction Date!", "error");
		return;	
	}
	
	
	
	
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:87,amount:amount,acno:acno,date:date,odetail:odetail},
	success:function(data){
	$('#message').html(data);
	}
	});
	
}

function cashwith(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:165},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function checkavbal(a,b){
	if(parseFloat(a,10)<parseFloat(b,10)){
		swal("Error", "Amount available in the customer account is less than the amount to be withdrawn!", "error");
		var str=$("#amount").val();
		var b=str.length;
		b=b-1;
		var g=str.substr(0,b);
		$("#amount").val(g).focus();
		return;
	}
		
}


function checkamwith(){

		var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	
		if(amount==''||amount==null){
			amount=0;
		}
		var normbal=$('#normacbal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		
		var bal1=parseFloat(normbal)-parseFloat(amount);
		
		if(bal1<0){
				$('#amount').val(0);
				$('#amounta').val('');
				swal("Error", "Normal Account Balance cannot be less than zero after transaction!", "error");
				return;	
		}
		
		$('#amounta').val((parseFloat(amount)).formatMoney(2, '.', ','));
		
}


function cashwithdraw(){
	/*Account Details*/
	var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var date=$('#date').val();
	var odetail=$('#details').val();
	var acno=$('#acno').val();
	if(amount==''||amount==0){
	swal("Error", "Normal Account Balance cannot be less than zero after transaction!", "error");
	$('#amount').focus();
	return;
	}

	else if(odetail==''){
		swal("Error", "Enter the explanation details for the transaction!", "error");
		return;	
	}
	else if(date==''){
		swal("Error", "Enter the Transaction Date!", "error");
		return;	
	}
	
	$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:88,amount:amount,acno:acno,date:date,odetail:odetail},
	success:function(data){
	$('#message').html(data);
	}
	});
	
}


function activatetenancy(tid){

			
			swal({
			  title: "Are you sure?",
			  text: "The member will be reactivated.",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:89,tid:tid},
				success:function(data){
				$('#message').html(data);
				}
				});
			  
			});

}

function deactivatetenancy(tid){

			
			swal({
			  title: "Are you sure?",
			  text: "The member will be deactivated.",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$.ajax({
				url:'data.php',
				data:{id:91,tid:tid},
				success:function(data){
				$('#message').html(data);
				}
				});
			  
			});

}

function budman(){	
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:167},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savebudget(code){
	var amount =  $('#amount' + code).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	$('#save'+ code).html('<img id="img-spinner" src="img/spin.gif" style="width:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:'90',code:code,amount:amount},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}


function plcomp(){	
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:76.6},
	success:function(data){
	$('#display').html(data);
	}
	});
}

function enterplcomp(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
if(d1==''||d2==''){
		swal("Error", "Enter the Months!", "error");
}
else {window.open("report.php?id=73&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}


function propbygroup(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:168},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterpropbygroup(){
var name = $('#itemname').val();
var code=4;
if(name==''){
	swal("Error", "Select the Group!", "error");
}
else {window.open("report.php?id=74&" + "\ncode=" + code + '&' + "\nname=" + name );}
}


function fieldbygroup(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:169},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterfieldbygroup(){
var name = $('#itemname').val();
var code=4;
if(name==''){
	swal("Error", "Select the Group!", "error");
}
else {window.open("report.php?id=75&" + "\ncode=" + code + '&' + "\nname=" + name );}
}

function viewbreakdown(param){
	 $(".row"+param).toggle();
}

function populateledgers(){
	$("#addledgerdiv").html('<img id="img-spinner" src="images/load.gif" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:'54.1'},
	success:function(data){
	$('#addledgerdiv').html(data);
	
	}
	});
}


function sharesrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:170},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersharesrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=76&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}


function loansrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:171},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterloansrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=77&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function loansageing(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:172},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterloansageing(){
var d2 = $('#date2').val();
if(d2==''){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=78&" + "\nd2=" + d2);}
}

function sharesageing(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:173},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entersharesageing(){
var d2 = $('#date2').val();
if(d2==''){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=79&" + "\nd2=" + d2);}
}


function memberstate(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:174},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function entermemberstate(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var a=2;
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0;}

var active = $('input[name=viewonlyactive]:checked').val();
if(!(active)){active=0;}


if((d1==''||d2=='')&&view==0){
	swal("Error", "Enter the Start and End Dates!", "error");
}
else if(name==''){
	swal("Error", "Select a Member!", "error");
	
}
else if(view==1){
	
	window.open("report.php?id=80&code=" + a + '&' + "\nname=" + name + '&' + "\nactive=" + active);
}
else {window.open("report.php?id=80&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nactive=" + active);}

}

function loansarrears(){

    var a=0;
    var name='All';
	window.open("report.php?id=81&code=" + a + '&' + "\nname=" + name);
}

function almostdue(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:175},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function enteralmostdue(){
var name = 'All';
var d1 = $('#date2').val();
	if(d1==''){
			swal("Error", "Enter the Due Dates!", "error");
	}
	var a=1;
window.open("report.php?id=82&code=" + a + '&' + "\nname=" + name + '&' + "\nd1=" + d1);
}

function transrep(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:176},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function entertransrep(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=83&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}


function loansrepayment(){
	$('#display').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute; top:65%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:177},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function enterloansrepay(){
var d1 = $('#date1').val();
var d2 = $('#date2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){view=0}
if((d1==''||d2=='')&&view==0){
		swal("Error", "Enter the Start and End Dates!", "error");
}
else {window.open("report.php?id=84&" + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}



function emploans(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:179},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function addemploan(){
var hid =  $('#property').val();
var hname=$('#property option:selected').text();
var amount=$('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var interest=$('#interest').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var loanpurpose=$('#loanpurpose').val();
var months=$('#months').val();
var date=$('#date').val();
var refno=$('#refno').val();
var guarrantor=$('#guarrantor').val();
var security =  $('#security').val();
var otherdetails =  $('#otherdetails').val();
var pid =  $('#ledgername').val();
var pname=$('#ledgername option:selected').text();
var mode=$('#mode').val();
var loantype=$('#loantype').val();
var startmonth=$('#startmonth').val();

if(hid==''||amount==''||interest==''||months==''||mode==''||pid==''){
swal("Error", "Fill all the required fields!", "error");
return;
}

else{
$('#message').html('<img id="img-spinner" src="img/spin.gif" style="width:30px;position:absolute;" alt="Loading"/>');
$.ajax({
url:'data.php',
data:{id:92,hid:hid,hname:hname,amount:amount,startmonth:startmonth,loantype:loantype,date:date,interest:interest,loanpurpose:loanpurpose,months:months,guarrantor:guarrantor,security:security,otherdetails:otherdetails,refno:refno,mode:mode,pid:pid,pname:pname},
success:function(data){
$('#message').html(data);
}
});	
}	
}

function updownsacco(){
$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; top:25%; left:50%;width:30px" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:180},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function viewpayschedule(){
var name = $('#month2').val();
type='Sacco';
if(name==''){
		swal("Error", "Enter the Month!", "error");
}
else {window.open("report.php?id=86&" + "\ntype=" + type  + '&' + "\nname=" + name);}
}


function loadextenants(){

	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:50,loadex:1},
	success:function(data){
	$('#mainp').html(data);
	}
	});

}

function deletetableRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function addtableRow(){
var t = document.getElementById('nyumbakumi');
var r ="<tr class='gradeX' id='normal'><td style='width:40%;'><input  type='text' style='width:100%;  text-align:left'  value=''/></td><td style='width:10%;'><input  type='text' style='width:100%;  text-align:left'  value=''/></td><td style='width:20%;'><input  type='text' style='width:100%;  text-align:left'  value=''/></td><td style='width:20%;'><input  type='text' style='width:100%;  text-align:left'  value=''/></td><td style='width:10%;cursor:pointer'><input type='button' value='Delete' onclick='deletetableRow(this)'/></td></tr>";
//t.tBodies[0].appendChild(r)
$('#kumibody').append(r);
}

function cardregister(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:182},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savecardregister(){
var cardno = $('#cardnumberregister').val();

		
		if(cardno==''){
		swal("Error", "Enter the Card Number!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:95,cardno:cardno},
		success:function(data){
		$('#message').html(data);
		$('#cardnumberregister').focus().val('');
		}
		});	
		}	
}

$(document).ready(function(){
	$('#cardnumberregister').off();
	$('#cardnumberregister').on('keyup', function(ex) {
		ex.preventDefault();
		ex.stopPropagation();
		if (ex.keyCode==13){ 
			var cardno = $('#cardnumberregister').val();
			$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
			$.ajax({
			url:'data.php',
			data:{id:95,cardno:cardno},
			success:function(data){
			$('#message').html(data);
			$('#cardnumberregister').focus().val('');
			}
			});	
		}
	});
});

$(document).ready(function(){
	$('#cardnumberregisteratt').off();
	$('#cardnumberregisteratt').on('keyup', function(ex) {
		ex.preventDefault();
		ex.stopPropagation();
		if (ex.keyCode==13){ 
			var cardno = $('#cardnumberregisteratt').val();
			var workid = $('#workid').val();
			$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
			$.ajax({
			url:'data.php',
			data:{id:100,cardno:cardno,workid:workid},
			success:function(data){
			$('#message').html(data);
			$('#cardnumberregisteratt').focus().val('');
			}
			});	
		}
	});
});

function findcards(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:183},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function assigncard(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:184},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savecardassign(){
var tid = $('#membername').val();
var cardno = $('#cardno').val();

		
		if(cardno==''||tid==''){
		swal("Error", "Both the Card Number and Member Name are required!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:96,cardno:cardno,tid:tid},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function workregistry(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:185},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function saveworkregistry(a,b){
var title = $('#title').val();
var location = $('#location').val();
var startdate = $('#startdate').val();
var enddate = $('#enddate').val();
var remarks = $('#remarks').val();
		
		if(title==''||location==''||startdate==''||enddate==''){
		swal("Error", "Enter the Required Details!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:98,title:title,location:location,startdate:startdate,enddate:enddate,remarks:remarks,a:a,b:b},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function findworkshops(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:186},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function seeworkshop(a){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:188,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function saveworkshopatt(workid){
var cardno = $('#cardnumberregister').val();

		
		if(cardno==''){
		swal("Error", "Enter the Card Number!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:100,cardno:cardno,workid:workid},
		success:function(data){
		$('#message').html(data);
		$('#cardnumberregister').focus().val('');
		}
		});	
		}	
}

function forumsregistry(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:192},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function saveforumsregistry(a,b){
var title = $('#title').val();
var author = $('#author').val();
var startdate = $('#date').val();
var remarks = $('#remarks').val();
		
		if(title==''||author==''||startdate==''||remarks==''){
		swal("Error", "Enter the Required Details!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:101,title:title,author:author,startdate:startdate,remarks:remarks,a:a,b:b},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function findforums(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:193},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function seeforum(a){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:195,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}




function cmeregistry(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:198},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function savecmeregistry(a,b){
var title = $('#title').val();
var author = $('#author').val();
var startdate = $('#date').val();
var enddate = $('#enddate').val();
var remarks = $('#remarks').val();
var pdf = $('#stamp').val();


		if(title==''||author==''||startdate==''||remarks==''||enddate==''){
		swal("Error", "Enter the Required Details!", "error");
		return;
		}
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:103,title:title,author:author,startdate:startdate,remarks:remarks,a:a,b:b,enddate:enddate,pdf:pdf},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}

function findcme(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:199},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function seecme(a){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:201,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function bulksms(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:204},
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

function selectsmsgroup(){
var name = $('#smsgroup').val();
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

function calcmesslength2(){
var message = $('#messages2').val();
len=message.length;
mess=Math.ceil(len/160);
$('#messlength2').html(len+' characters: '+mess+' of '+mess+' messages.');

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
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:105,message:message},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}


function savequickmessage(){
var message = $('#messages2').val();
var phoneno = $('#phoneno').val();
var contlength = $('#contlength2').val();

		
		if(phoneno==''){
		swal("Error", "Enter the Phone Number!", "error");
		return;
		}

		else if(message==''){
		swal("Error", "No Message Entered!", "error");
		return;
		}
		
		
		else{
		$('#message2').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:106,message:message,phoneno:phoneno},
		success:function(data){
		$('#message2').html(data);
		}
		});	
		}	
}

function sendautosms(categ){
	swal({
			  title: "Are you sure?",
			  text: "The sms will be sent for this category!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$('#message3').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:107,categ:categ},
				success:function(data){
				$('#message3').html(data);
				}
				});
			  
			});
}


function bulkemail(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:205},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function saveemail(){
var message = $('#emailmessage').val();
var subject = $('#emailsubject').val();
var contlength = $('#contlength').val();

		
		if(contlength==''||contlength==0){
		swal("Error", "No contacts selected!", "error");
		return;
		}

		else if(subject==''){
		swal("Error", "No Subject Entered!", "error");
		return;
		}
		
		else if(message==''){
		swal("Error", "No Message Entered!", "error");
		return;
		}
		
		
		else{
		$('#message').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:108,message:message,subject:subject},
		success:function(data){
		$('#message').html(data);
		}
		});	
		}	
}


function savequickemail(){
var message = $('#emailmessage2').val();
var subject = $('#emailsubject2').val();
var email = $('#emailto2').val();

		
		if(email==''){
		swal("Error", "No email entered!", "error");
		return;
		}

		else if(subject==''){
		swal("Error", "No Subject Entered!", "error");
		return;
		}
		
		else if(message==''){
		swal("Error", "No Message Entered!", "error");
		return;
		}
		
		
		else{
		$('#message2').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:109,message:message,subject:subject,email:email},
		success:function(data){
		$('#message2').html(data);
		}
		});	
		}	
}


function sendautoemail(categ){
	swal({
			  title: "Are you sure?",
			  text: "The Email will be sent for this category!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, Continue!",
			  closeOnConfirm: true
			},
			function(){
				$('#message3').html('<img id="img-spinner" src="img/spin.gif" style="margin-top:0px;width:30px" alt="Loading"/>');
				$.ajax({
				url:'data.php',
				data:{id:110,categ:categ},
				success:function(data){
				$('#message3').html(data);
				}
				});
			  
			});
}


function findsms(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:206},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function findemails(){
	$("#mainp").html('<img id="img-spinner" src="img/spin.gif" style="position:absolute; width:30px;top:25%; left:60%" alt="Loading"/>');
	$.ajax({
	url:'bridge.php',
	data:{id:207},
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
