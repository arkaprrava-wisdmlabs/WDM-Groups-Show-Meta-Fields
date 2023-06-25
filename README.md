## Problem Statement:
<ol> 
<li> Add checkout field details in the orders page
<ol><li>Show user-selected group on the order page: </li></ol></ol>
<ol><li> Add checkout field details in the emails
<ol><li> We will add user selected group in the Order received email for customer, order received email for Admin & Order complete email</li></ol>
## Approach:
<ol>
<li> Check if the Checkout Field Editor for WooCommerce plugin is active or not </li>
<li> Add admin notice for plugin dependency </li>
<li> Hook into 'woocommerce_email_order_meta_fields' to add meta fields to user email content </li>
<li> Hook into 'thwcfd_order_details_after_custom_fields_table' to add meta fields to the meta fields table in order recieved thank you page </li>
<li>
<ol>
<li>Get the order object from the hooks</li>
<li>Get order id from order object</li>
<li>Get the meta field value using the meta key 'inmedwdm_user_register_group' for the order id</li>
<li>Get the title of the meta value</li>
</ol>
</li>
<li> Add meta fields for 'Demo Field' and its value to the fields array</li>
<li> echo 'Demo Field' and its value to the order recieved thank you page</li>