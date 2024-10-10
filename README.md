# orcCommerce
Laravel 11 based Simple e-commerce project

# Goal
I want to have a basic platform for my repeating e-commerce projects.
Few features keeps repeating in my project so i want to add those in this.
I want to make this fool proof as possible. Because i hate maintenance.

## Targets
### Automatic seo features.
Most users not knowledgeable enough to make decisions on seo. So i want to generate meta keywords based on product  info when no keyword or tag provided. meta keywords also will change auto in time to force bots to update.

### Auto image optimization.
Want to convert every image that uploaded to web format.

### Smart caching based on load times.
I will have profilers in critical pages like homepage, product listing, etc. A scheduled worker will check load times that provided by profiler. Based on data it will decide to cache few bad performer queries.

### Flexible crud controller.
Most of e commerce operations has lots of crud. So a flexible controller will be useful. ### Smart

### Proper pair trail.
Some E-commerce operations requires this. So having every agreement in database sometimes a legal obligation. Purchase is a agree between buyer and seller.

### Excluding Invoice and payment system.
Most of E-commerce system has their own invoice and payment gateway solution. Invoice and payment areas progressing in different pace and technology. Performance and Quality expectations are very different. So keeping them apart from this will make everything simpler for both parties.


# Progress
- Basic operations like Auth, Control panel etc.
- First version of crud controller
- Auto product image conversion
