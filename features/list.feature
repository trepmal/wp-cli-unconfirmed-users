Feature: List unconfirmed users

  Scenario: List unconfirmed users
    Given a WP multisite install

    When I run `wp unconfirmed list`
    Then STDOUT should contain:
      """
      No unconfirmed users found
      """
