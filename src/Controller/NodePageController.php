<?php
/**
 * @file
 * Contains \Drupal\node_page_json\Controller\NodePageController.
 */
namespace Drupal\node_page_json\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;


class NodePageController extends ControllerBase {
  /**
   * container interface.
   *
   * @var \Symfony\Component\DependencyInjection\ContainerInterface
   */
  protected $config;

  /**
   * Constructs a NodePageController object
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config service.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->config =  $config_factory;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }
  /**
  * @param $apikey - string
  * api key value from url
  * @param NodeInterface $node -entity
  * node loaded from node id parameter
  * @return JsonResponse
  */
  public function content($apikey, NodeInterface $node)  {
    // Site API Key configuration value
    $user_apikey_entered = $this->config->getEditable('node_page_json.settings')->get('siteapikey');
    //check apikey value is correct and node is valid and in page content type
    if($node->getType() == 'page' && $user_apikey_entered == $apikey && $user_apikey_entered != 'No API Key yet')  {
      // Return the JSON Response.
      return new JsonResponse( $node->toArray(), 200, ['Content-Type'=> 'application/json']);
    } else  {
      return new JsonResponse(["status" => "Access denied"], 403, ['Content-type' => 'application/json']);
    }
  }

}
