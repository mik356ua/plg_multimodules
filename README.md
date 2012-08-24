plg_multimodules
================

MultiModules System Plugin for Joomla!1.5. Adds Multicategories support to your modules

### Dependencies

1. [Multicategories Component for Joomla!1.5]
(http://extensions.joomla.org/extensions/structure-a-navigation/multi-categorization/12374)

2. [Advanced Module Manager Component for Joomla!1.5]
(http://extensions.joomla.org/extensions/style-a-design/modules-management/10307)

### Usage

To add Multicategories support to your module you should add parameter with name "multicategories" and type "multicategoriescategory" to `your_module.xml` file. Something like that:

```xml
<param name="multicategories" type="multicategoriescategory" default="" size="10" multiple="multiple" label="Multicategories" description="Choose categories with Ctrl+Click"/>
```

If you want to add Multicategories Articles support as well you should add another one parameter:

```xml
<param name="multicategories_articles" type="radio" default="0" label="Multicategories Articles" description="Enable/Disable multicategories articles support">
    <option value="1">Yes</option>
    <option value="0">No</option>
</param>
```