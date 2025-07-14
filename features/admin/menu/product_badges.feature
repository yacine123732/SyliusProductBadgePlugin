@admin_dashboard
@product_badges_menu
Feature: Accessing Product Badges from the configuration menu
    In order to manage product badges
    As an Administrator
    I want to open product badge configuration from the admin menu

    Background:
        Given the store operates on a channel named "WEB"
        And I am logged in as an administrator

    @ui
    Scenario: Seeing Product Badges link in configuration menu
        When I open administration dashboard
        Then I should see "Product Badges" in the configuration menu
