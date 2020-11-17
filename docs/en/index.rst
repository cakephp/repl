CakePHP Repl
############

This REPL plugin provides an interactive command prompt that lets you interact
with and inspect objects in your application.

It also provides several global functions to make debugging and interactive
sessions simpler.

Installation
============

You can install this plugin into your CakePHP application using `composer
<https://getcomposer.org>`_.

Run the following command:

.. code-block:: bash

    composer require --dev cakephp/repl

Next, load the plugin by adding the following statement to
`Application::bootstrapCli()` method in the **src/Application.php** file of your
application::

    $this->addPlugin('Cake/Repl');


Usage
=====

You can start the interactive console using:

.. code-block:: bash

    bin/cake console

This will bootstrap your application and start an interactive console. At this
point you can interact with your application code and execute queries using your
application's models:

.. code-block:: bash

    bin/cake console

    >>> $articles = table('Articles');
    // object(Cake\ORM\Table)(
    //
    // )
    >>> $articles->find()->all();

Since your application has been bootstrapped you can also test routing using the
REPL::

    >>> Cake\Routing\Router::parse('/articles/view/1');
    // [
    //   'controller' => 'Articles',
    //   'action' => 'view',
    //   'pass' => [
    //     0 => '1'
    //   ],
    //   'plugin' => NULL
    // ]

You can also test generating URL's::

    >>> Cake\Routing\Router::url(['controller' => 'Articles', 'action' => 'edit', 99]);
    // '/articles/edit/99'

To quit the REPL you can use ``CTRL-C`` or by typing ``exit``.

Reading Documentation
=====================

In the REPL you can view documentation for objects, methods and properties with
``doc``::

    >>> doc $users->find

You can get a list of available properties, constants and methods on a class
with ``ls``::

    >> ls -al \Cake\ORM\Table

Helper Functions
================

To make interacting with your application easier, a few helper functions are
provided:

* ``table(string $alias, array $options = [])`` This function is a wrapper for
  ``TableRegistry::getTableLocator()->get($alias, $options)``.
* ``breakpoint()`` Returns code to create an Xdebug compatible breakpoint. You
  should ``eval()`` the output of this method. e.g ``eval(breakpoint());``.
