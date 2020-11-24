<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


/*Home Page*/
$route['default_controller'] = 'home';
$route['login'] = 'Home/login';
$route['register'] = 'Home/register';
$route['post-login'] = 'Home/postLogin';
$route['general-setting'] = 'Home/generalSetting';
$route['address-setting'] = 'Home/addressSetting';
$route['save-register'] = 'Home/saveRegister';
$route['logout'] = 'Home/logout';
$route['about-us'] = 'Home/aboutUs';
$route['vertical/(:any)'] = 'Home/getVertical/$1';
$route['category/(:any)'] = 'Home/category/$1';
$route['title'] = 'Home/getTitle';
$route['view-details/(:any)'] = 'Home/viewDetails/$1';
$route['my-account/(:any)'] = 'Home/myAccount/$1';
$route['profile-setting'] = 'Home/profileSetting';
$route['change-password'] = 'Home/changePassword';
$route['order-details/(.+)'] = 'Home/view_order/$1';
$route['order-delete/(.+)'] = 'Home/delete_order/$1';
$route['view-partner/(:any)'] = 'Home/viewPartnerDetails/$1';
$route['saveMe/(:any)'] = 'Home/saveMe/$1';
$route['my-wishlist/(:any)'] = 'Home/myWishlist/$1';
$route['delete-wishlist/(:num)/(:num)'] = 'Home/deleteWishlist/$1/$2';
$route['partner-program'] = 'Home/partnerProgram';
$route['demo1'] = 'Home/demo1/';
$route['demo2'] = 'Home/demo2/';


$route['listing1'] = 'Home/getListing1';
$route['listing2'] = 'Home/getListing2';


$route['products'] = 'Home/productpage';
$route['product-details/(.+)'] = 'Home/product_details/$1';
$route['shop-by-category/(.+)'] = 'Home/shop_by_category/$1';


$route['contact'] = 'Home/contact_page';
$route['contact-form'] = 'Home/insert_contact_info';

// Contact Form

$route['contact-message-list'] = 'Contact/get_all_contact_message';
$route['delete-contact/(.+)'] = 'Contact/delete_contact_by_id/$1';
$route['view-contact/(.+)'] = 'Contact/view_contact_by_id/$1';
$route['replay-contact/(.+)'] = 'Contact/replay_contact_by_id/$1';


/*Creative Partner*/

$route['partner-login'] = 'CreativePartner/login';
$route['partner-register'] = 'CreativePartner/register';
$route['partner-post-login'] = 'CreativePartner/postLogin';
$route['partner-save-register'] = 'CreativePartner/saveRegister';
$route['partner-dashboard'] = 'CreativePartner/dashboard';

$route['add-my-product'] = 'Product/addMyProduct';
$route['upload-image'] = 'Product/uploadMyProductImage';
$route['my-upload'] = 'Product/showMyProduct';
$route['save-my-product'] = 'Product/insert_my_product';
$route['save-my-upload'] = 'Product/insert_my_upload';
$route['edit-my-product/(.+)'] = 'Product/editMyProduct/$1';
$route['update-my-product'] = 'Product/update_my_product';
$route['delete-my-product/(.+)'] = 'Product/delete_my_product/$1';
$route['partner-profile/(.+)'] = 'CreativePartner/profile/$1';
$route['update-partner-profile'] = 'CreativePartner/update_partner_profile';
$route['partner-logout'] = 'CreativePartner/logout';
$route['password-change'] = 'CreativePartner/passwordChange';
$route['portfolio'] = 'CreativePartner/getPortfolio';
$route['reports'] = 'CreativePartner/getReports';
$route['generate-pdf'] = 'CreativePartner/generatePdf';
$route['insights'] = 'CreativePartner/getInsights';
$route['upkeep'] = 'CreativePartner/getUpkeep';
$route['tooltip'] = 'CreativePartner/tooltip';





/*Admin Panel*/
$route['admin'] = 'Home/admin_login';
$route['dashboard'] = 'Admin/index';

$route['save-category'] = 'Category/save_category';
$route['category-list'] = 'Category/show_category_list';

$route['update-category'] = 'Category/update_category';
$route['delete-category/(.+)'] = 'Category/delete_category/$1';



/*Partner*/
$route['partner-list'] = 'Admin/partner_list';
$route['save-partner'] = 'Admin/save_partner';
$route['update-partner'] = 'Admin/update_partner';
$route['delete-partner/(.+)'] = 'Admin/delete_partner/$1';
$route['partner-status/(.+)'] = 'Admin/partner_status/$1';

/*User*/

$route['user-list'] = 'Admin/user_list';
$route['save-user'] = 'Admin/save_user';
$route['update-user'] = 'Admin/update_user';
$route['delete-user/(.+)'] = 'Admin/delete_user/$1';

$route['user-status/(.+)'] = 'Admin/user_status/$1';

/*Admin Product*/
$route['add-product'] = 'Product/addProduct';
$route['product-list'] = 'Product/showProduct';
$route['save-product'] = 'Product/insert_product';
$route['edit-product/(.+)'] = 'Product/editProduct/$1';
$route['update-product'] = 'Product/update_product';
$route['delete-product/(.+)'] = 'Product/delete_product/$1';


// Cart Class
$route['add-to-cart'] = 'Cart/add_to_cart';
$route['cart'] = 'Home/show_cart';
$route['delete-to-cart/(.+)'] = 'Cart/delete_to_cart/$1';
$route['update-cart-qty'] = 'Cart/update_cart_quantity';
$route['update-cart-qty-payment'] = 'Cart/update_cart_quantity_payment';
$route['delete-to-cart-payment/(.+)'] = 'Cart/delete_to_cart_payment/$1';

// Checkout
$route['checkout'] = 'Checkout/checkout';
$route['place-order'] = 'Checkout/place_order';
$route['order-success'] = 'Checkout/order_success';

// SearchN
$route['search'] = 'Search/index';

// Invoice
$route['manage-order'] = 'Invoice/manage_order';
$route['view-order/(.+)'] = 'Invoice/view_order/$1';
$route['delete-order/(.+)'] = 'Invoice/delete_order/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
