<?php

namespace Drupal\segallio_github;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class SegallIoGithubApi
 */
class SegallIoGithubApi implements SegallIoGithubApiInterface {

  /**
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * @var \League\OAuth2\Client\Token\AccessToken
   */
  protected $accessToken;

  /**
   * SegallIoGithubApi constructor.
   *
   * @param \GuzzleHttp\Client $http_client
   */
  public function __construct(\GuzzleHttp\Client $http_client) {
    // todo - move to service.
    /** @var SessionInterface $session */
    $session = \Drupal::service('session');
    $this->accessToken = $session->get('github_access_token');
    $this->httpClient = $http_client;
  }


  /**
   * {@inheritdoc}
   */
  public function getGists() {
    return $this->beautify('users/roysegall/gists');
  }

  /**
   * {@inheritdoc}
   */
  public function getEvents() {
    return $this->beautify('users/RoySegall/events');
  }

  /**
   * Making the response beauty.
   *
   * @param $endpoint
   *   The endpoint to access.
   *
   * @return array
   *   List of events.
   */
  protected function beautify($endpoint) {
    $response = $this->httpClient->get('https://api.github.com/' . $endpoint . '?access_token=' . $this->accessToken->getToken());
    return json_decode($response->getBody()->getContents());
  }

}