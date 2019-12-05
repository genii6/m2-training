<h2>Unit 1. Introduction</h2>
**Module-based Architecture**
* 1.1 Create an empty module in the app/code folder. Activate it and verify in app/etc/config.php that the new module is active.

**Configuration XML & Variables Scope**

* 1.2 Browse the Magento codebase and list all possible config files in the <Module>/etc folder. How many areas are used for those files?

**Dependency Injection** *Module: HelloWorld*

* 1.3 Create a preference for Magento\Theme\Block\Html\Footer. Modify the method getCopyright() so that it adds the text “Hello world” next to the copyright.

Disable your customization once you verify that it works, since this is not the recommended way to make these types of changes.

**Plugins** *Module: AfterPlugin*
* 1.4 Create an after plugin to the \Magento\Framework\App\Action\Action::dispatch method which is called every time Magento processes a URL. Make this plugin work only on the frontend.
  * Inject \Psr\Log\LoggerInterface into the plugin’s constructor (figure out which exact class corresponds to it).
  * Access an instance of the Action class in the plugin, and call $subject->getRequest()- >getFullActionName() to obtain the full action name that corresponds to the URL.
  * Log this information using LoggerInterface.
  * Find the file it logs to and find your record.

**Observers** *Module: ActionLoggerObserver*

* 1.5 Perform the same operation as in Exercise 1.4 using plugins, but instead use an observer.
  * Create an observer on the event controller_action_predispatch.
  * Identify which class fires this event. Access the full action name (to do this you need to get the $request object).
  * Inject \Psr\Log\LoggerInterface into the observer’s constructor and log the full action name in the same way as you did in the previous exercise using plugins.

**CLI**

* 1.6 Play around with the Magento command-line tool to perform the following actions:
  * Print out a list of all available commands
  * Print a list of all active/inactive modules
  * Clean the cache
  * Clean only the config cache
  * Print a list of available indexers
  * Reindex prices

* 1.7 Create your own CLI command that prints "Hello World" *Module: CustomCommand*
  * You need to add one record into the di.xml file to modify \Magento\Framework\Console\CommandListInterface and add another class to the commands array.
  * Next, create a console command class.
  * Refer to \Magento\Indexer\Console\Command\IndexerShowModeCommand as an example.

<hr/>

<h2>Unit 2. Request Flow</h2>
**Routers**
* 2.1 Create an extension that logs a list of routers from every request into a file. (Module: RouterListLogger) 

Log the router using get_class($router)

**Base Router**
* 2.2 Identify which action class handles the shopping cart page.

**Result Objects** *(Module: ActionClasses)*
* 2.3 Create an action class for each of the following result object types:
  * Page (does nothing, just returns an empty page)
  * Raw (returns “Hello world”)
  * Json (returns array containing "Hello World")
  * Redirect – Redirects to the Raw action above
  * Forward – Forwards to the Json action above
  
**URL Rewrites**
* 2.4 Visit any product page. Note its URL. Find the Magento path for this URL. Verify that it leads to the same page.
* 2.5 Add a URL rewrite for each action created in Exercise 2.3, so that the page is available at /custom-page- <type>.html URL. Create a CLI command which will generate those URL rewrites using \Magento\UrlRewrite\Model\UrlRewrite. *(Module: UrlRewriteCommand)*

<hr/>

<h2>Unit 3. Customizing the Magento UI</h2>

**Blocks** *(Module: ActionClassBlock)*
* 3.1 Using an action class, create and render a text block that displays "Hello World"
  * Use the Layout object to instantiate the block
  * Return a Raw result object

**Templates**
* 3.2 Create a custom template block and a custom template file for it that displays "Hello World“. Render the block in an action class.

**Layout**
* 3.3 Create a page with the text "Hello World" in the content container using layout and a template. *(Module: HelloWorldContent)*
* 3.4 Add a snippet to the footer that renders “Hello World” on every page. *(Module: HelloWorldContent)*
* 3.5 Customize MyAccount section: *(Module: CustomerBonuses)*
  * Add a new section called "Bonuses".
  * Render "Hello world" inside.
  * Make it look like the rest of MyAccount.
  * Remove the Downloadable Products section.
* 3.6 Create a page that looks like checkout using only XML instructions and a new route. *(Module: CheckoutJourney)*

**View Models** *(Module: ViewModel)*
* 3.7 Create a new page that renders a hard-coded string array using a view model.
  * Create a getter in the view model.
  * Pass this class as an argument to a block in layout (use \Magento\Framework\View\Element\Template).
  * Create a template for this block, and access the getter in the template.

**Themes**
* 3.8 Register a new theme as a child of the luma theme and apply it in the admin.
* 3.9 Magento allows you to place static assets into the module within the view folder (or in the MyCompany_MyModule folder in the theme). Explain how those static files become available for browsing. For a given js file under MyCompany/MyModule/view/frontend/web folder, what would be its public URL?
**Hints:**
* 3.8 : See Swift Otter guide page 90/91