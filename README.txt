CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Configuration
 * Example URL
 * Spent Time
 * References

-- INTRODUCTION --

This module return node json values if siteapi key value added

CONFIGURATION
-------------

 1. Enable the module under /admin/modules within the group 'Custom'.

 2. Goto admin/config/system/site-information and add site api key.

Example URL
-----------

http://localhost/page_json/[APIKEY]/[NodeID]

Spent Time
----------

3 hrs.

Regerences
----------

1. Routing parameter pass - https://www.drupal.org/docs/8/api/routing-system/parameters-in-routes/using-parameters-in-routes
2. Form alter - https://drupal.stackexchange.com/questions/156703/how-can-i-add-a-textbox-in-site-information-configuration
3. Json response - https://gist.github.com/signalpoint/97bfd628f47a5ddaeb05, https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.6.x
4. configuration files - https://www.drupal.org/docs/drupal-apis/configuration-api/configuration-schemametadata


