/**
 * Created by wang on 13/06/17.
 */

/**
 * Load bag image and preview in page.
 * @param input
 */
function loadBagImage(input) {
    if (typeof (FileReader) != "undefined") {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#bagImage").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    else {
        alert("Sorry, your browser cannot support image preview.");
    }
}

/**
 * Redirect to bag management page
 */
function backToBagManagement() {
    window.location.href = "Admin.php?page=BagManagement";
}

/**
 * Add a bag to the shopping cart and update items quantity displayed in the page
 * @param bagID
 */
function addToCart(bagID) {
    $.ajax({
        url: "/wangc95/php_assignment/scripts/addCart.php",
        type: "POST",
        data: {'bagID': bagID},
        success: function (result) {
            var currentQty = parseInt($("#cartQty").text());
            $("#cartQty").text(currentQty + 1);
            $("#cartQtySide").text(currentQty + 1);
            location.reload();
        }
    });
}

/**
 * Update the quantity of a given bag in the shopping cart
 * @param bagID
 * @param qty
 */
function updateCartQty(bagID, qty) {
    $.ajax({
        url: "/wangc95/php_assignment/scripts/updateCart.php",
        type: "POST",
        data: {
            'bagID': bagID,
            'adjust': qty,
            'action': 'changeQuantity'
        },
        success: function (result) {
            if (result != 'fail')
            {
                location.reload();
            }
            else
            {
                alert(result);
            }
        }
    });
}

/**
 * Remove an item in the shopping cart
 * @param bagID
 */
function removeCartItem(bagID) {
    $.ajax({
        url: "/wangc95/php_assignment/scripts/updateCart.php",
        type: "POST",
        data: {
            'bagID': bagID,
            'action': 'removeItem'
        },
        success: function () {
            location.reload();
        }
    });
}

/**
 * Clear shopping cart
 */
function clearCart() {
    $.ajax({
        url: "/wangc95/php_assignment/scripts/updateCart.php",
        type: "POST",
        data: {
            'action': 'clearCart'
        },
        success: function () {
            location.reload();
        }
    });
}

/**
 * Check whether the shopping cart is empty when check out
 */
function checkOut() {
    location.href = "../shopping/CartCheckOut.php";
}

/**
 * Disable or enable a user account
 * @param userID
 * @param email
 * @param enabled
 */
function disableAccount(userID, email, enabled) {
    $.ajax({
        url: "/wangc95/php_assignment/scripts/disableAccount.php",
        type: "POST",
        data: {'userID': userID,
            'enabled': enabled},
        success: function (success) {
            if (success)
            {
                if (enabled)
                {
                    alert(email + ' has been disabled.');
                }
                else
                {
                    alert(email + ' has been enabled');
                }
            }
            else
            {
                if (enabled)
                {
                    alert('Disable ' + email + ' failed.');
                }
                else
                {
                    alert('Enable ' + email + ' failed.');
                }

            }
            location.reload();
        }
    });
}

/**
 * Redirect to add bag page
 */
function navToAddBag() {
    location.href = 'Admin.php?page=AddBag';
}

/**
 * Change status of a given order
 * @param orderID
 */
function changeOrderStatus(orderID) {
    var buttonID = "#btn" + orderID;
    $(buttonID).disabled = false;
}

/**
 * Update status of a given order
 * @param orderID
 */
function updateOrderStatus(orderID) {
    var selectElementID = "select" + orderID;
    var ddlStatus = document.getElementById(selectElementID);
    var newStatus = ddlStatus.options[ddlStatus.selectedIndex].value;

    $.ajax({
        url: "/wangc95/php_assignment/scripts/updateOrderStatus.php",
        type: "POST",
        data: {
            'orderID': orderID,
            'newStatus': newStatus
        },
        success: function (result) {
            if (result == 'success')
            {
                alert('Order status has been updated successfully.');
                var buttonID = "#btn" + orderID;
                $(buttonID).disabled = true;
            }
            else
            {
                alert('Order status update failed. Please try again');
                location.reload();
            }
        }
    })
}