// JavaScript Document

$(document).ready(function(){
	
	//prepare a working url depending on the environment
	var siteHostName = window.location.hostname;
	var localHostOrNot, ajaxLocalhostOrNot;
	
	if (siteHostName == "localhost") {
		ajaxLocalhostOrNot = "/tailoring";
	}else {
		ajaxLocalhostOrNot = "";
	}
	
	//function to delete Orders
	$("#delete_orders").click(function(e) {
		e.preventDefault();
		var checkedOrderIdString = "";
		var checkedCount = 0;
		var orderIdArray = document.orders.orderId;
		
		if (typeof orderIdArray.length === "number") {
			for(var i = 0; i < orderIdArray.length; i++) {
				if (orderIdArray[i].checked) {
					checkedOrderIdString += orderIdArray[i].value + "|";
					checkedCount++;
				}
			}
			
			if (checkedCount > 0) {
				$("#hidden_order_ids").val(checkedOrderIdString);
				$('#bs-example-modal-sm').modal();
			}
		}
		
		if (typeof orderIdArray.length === "undefined") {
			if (orderIdArray.checked) {
				$("#hidden_order_ids").val(orderIdArray.value);
				$('#bs-example-modal-sm').modal();
				//console.log(orderIdArray.value);
			}
		}
		
		
	});	
	
	$(".img_deletor").click(function() {
		var grandpapa = $(this).parent().parent();
		var image_id = grandpapa.find("input#del_image_id").val();
		var product_id = grandpapa.find("input#product_id").val();
		
		var pathToController = ajaxLocalhostOrNot + "/admin/delete_product_image";
		
		var dataArray = { image_id : image_id, product_id : product_id };
					
		$.post(pathToController, dataArray, function(data, status) {
			if (data == "success") {
				//alert(image_id + " " + product_id);
		
				grandpapa.remove();
			}
		});
		
		
	});
	
	$("td form").submit(function() {
		//get the property id and the table name for the property to be deleted
		var id = $(this).find('input[name=property_id]').val();
		var qty = $(this).find('input[name=table_name]').val();
		
		
		//now insert the id and qty into the value property of the modal
		var parentDiv = $("div.modal-body");
		parentDiv.find("input[name='delete-property-id']").val(id);
		parentDiv.find("input[name='table']").val(qty);
		
		return false;
	});
	
	//function to view Order Details
    $(".view_order").click(function(evt){
		evt.preventDefault();
		
		var loadingicon = $("#showloadingicon");
		
		//show loading icon
		loadingicon.fadeIn();
		
		var order_name = $(this).siblings("input#theOrdererName").val();
		var order_message = $(this).siblings("input#theMessage").val();
		
		$("#bs-example-modal-sm2").find("span#name").html(order_name);
		$("#bs-example-modal-sm2").find("#order_message").html(order_message);
		
		//show loading icon
		loadingicon.fadeOut();
		
		$("#bs-example-modal-sm2").modal();
    });
	
	
});

var loadingDiv = document.getElementById("showloadingicon");
//prepare a working url depending on the environment
var siteHostName = window.location.hostname;
var localHostOrNot, ajaxLocalhostOrNot;

if (siteHostName == "localhost") {
	ajaxLocalhostOrNot = "/tailoring";
}else {
	ajaxLocalhostOrNot = "";
}

function featureBlogOrNot($this) {
	
	//show the loading icon and the container div
	loadingDiv.style.display = "block";
	
	var dbUpdateValue;
	var productId = $this.value;
	
	if ($this.checked) {
		dbUpdateValue = "yes";
		updateProductCategoryTable(productId, dbUpdateValue);
		
	}else {
		dbUpdateValue = "no";
		updateProductCategoryTable(productId, dbUpdateValue);
	}
}

function updateProductCategoryTable(productId, dbUpdateValue) {
	//seprate the various values in destination
	
	var dataArray = "columnName=" + productId + "&columnValue=" + dbUpdateValue;
	
	//we will use XMLHttpRequest To Send and Fetch the vendor List
	var xmlhttp = new XMLHttpRequest();
	var url = ajaxLocalhostOrNot + "/admin/add_remove_food_home";
	
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			loadingDiv.style.display = "none";
		}
	}
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(dataArray);
	//console.log(tableName + " " + columnName + " " + productId);
}

function popupimage($this){
	// Get the modal
	var modal = document.getElementById('myModal');
	
	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");

	modal.style.display = "block";
	modalImg.src = $this.src;
	captionText.innerHTML = $this.alt;

	
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	} 
	//console.log($this.nextElementSibling.value + " " + $this.previousElementSibling.value);
}

/*function addRemoveFoodFromHome($this) {
	//we will be using the selected(ndex Property from the select to determine if an order should be open or closed
	//selectedIndex Of "0" Means Open
	//selectedIndex of "1" Means Closed
	
	if ($this.selectedIndex == 1) {
		
		//show the loading icon and the container div
		loadingDiv.style.display = "block";
		
		//get the id of this order from the hidden input field next to the select dropdown
		var food_details = $this.options[$this.selectedIndex].value;
		
		//we will use XMLHttpRequest To Send and Fetch the vendor List
		var xmlhttp = new XMLHttpRequest();
		var url = ajaxLocalhostOrNot + "/admin/add_remove_food_home";
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				displayFoodTable(xmlhttp.responseText);
				//hide the loading icon and the container div
				loadingDiv.style.display = "none";
			}
		}
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("food_details=" + food_details);
	}
}*/

function closeOpenOrder($this) {
	//we will be using the selected(ndex Property from the select to determine if an order should be open or closed
	//selectedIndex Of "0" Means Open
	//selectedIndex of "1" Means Closed
	
	if ($this.selectedIndex == 1) {
		//get the id of this order from the hidden input field next to the select dropdown
		var order_Id = $this.previousElementSibling.value;
		
		//insert the order Id into the popup div
		$("#hidden_close_order_ids").val(order_Id);
		
		//now pop up the pop up div
		$('#bs-example-modal-sm3').modal();
	}
}

