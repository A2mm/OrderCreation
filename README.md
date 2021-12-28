

### Updates taken

- adding magic method __construct with every class
- can pass parameters through class 
- shipping class will extend address from shipping class 
- this will calculate tax through this method calculate_tax()
- calculate_tax() checks for used shipping way and accordingly adds tax of country
- products class extends from shipping class
- calculate_price() method wil loop through product's attributes
- this method will change price (increment or decrement) according to key (name of attribute)
- user class will extend from address class
- this will producr adress used when change_status() of order 
- this will create object of this class returning different results according to dynamic parameters
- also dependent classes extend from parent classes
- added comments for each condition statement
- converted product attributes to mutlidimensional array 
- first level represents key (size or color)
- second one represents possible values of this key 
- tested every class seperately after changes
- passed parameters to order object should include user info and shipping info
- this will print recipt
- receipt contains the following :- 
- product names , categories, sizes, colors, total price 
















