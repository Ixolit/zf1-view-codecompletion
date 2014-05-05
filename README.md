# About this project

These interfaces and the tool to generate them is provided to facilitate code completion for Zend Framework 1 view
helpers. It uses a generated interface to include all view helpers. View helpers of own projects can be added using the
included script.

# How to use

Download the repository into your code tree, then cast your view variable in your controllers:

    /**
     * @var Ixo_ZendNavigationViewInterface
     */
    public $view;

You shouldn't actually load the interface itself, it's only used for code completion.

# Generate own interfaces

If you are using own view helpers (which you probably are), use the included `generate-helper-interface.php` script
to generate your own view helpers. Once the interface is complete, edit it to extend the existing
`Ixo_ZendViewInterface` and adjust the styling to your project.

# Contribution and License

The contents of this repository are released under the New BSD License. All contributed code is published under the
same license. For details see LICENSE.md