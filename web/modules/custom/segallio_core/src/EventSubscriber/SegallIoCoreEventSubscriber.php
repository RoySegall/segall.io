<?php

namespace Drupal\segallio_core\EventSubscriber;

use Drupal\social_auth_facebook\FacebookAuthManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class SegallIoCoreEventSubscriber.
 */
class SegallIoCoreEventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('onRequest', -100);

    return $events;
  }

  /**
   * Initializes bargain core module requirements.
   */
  public function onRequest(GetResponseEvent $event) {
//    $foo = \Drupal::service('social_auth_facebook.persistent_data_handler');
    /** @var FacebookAuthManager $foo */
    $foo = \Drupal::service('social_auth_facebook.manager');

  }

}
