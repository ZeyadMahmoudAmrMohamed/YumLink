# YumLink
![timeline](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/6bc6f601-6d9b-499b-8d46-b2af9fe5c7eb)

## A. Project Description and Problem Definition
Finding a delicious recipe online or finding other food enthusiasts who share similar food interests may be a tedious task. With a simple click of a button, YumLink is a social media platform that connects all food lovers at one place. It allows users to:
- Share mouthwatering recipes
- Like other food enthusiasts’ posts
- Comment on other user’s posts to engage with them and enrich the food community. 

In addition to posting and engaging with users, YumLink has a grocery store where people can buy the ingredients included in each post. The social media platform system is invoked for the following functions:
- Liking a post
- Commenting on a post
- Adding a post
- Buying items from the grocery store

## B. Project Functionalities



### B.1) User Registration:
![signup](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/ddb8e3b1-edad-474b-9b08-ba6068c41b29)
For the first time, the system will prompt the user to register an account to access the platform. The basic information required from users includes their:
- Full name
- Email
- Username
- Password
- Gender

The information will then be sent to the database for validation, and appropriate actions will be taken accordingly.

### B.2) User Login:
![signin](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/c91e8009-b722-499b-8813-68ddd2cca2a2)
To enter the website, users will be prompted to input their unique username and password.

### B.3) View Posts:
Users will have the luxury to view other people’s posts on their news feed. If the system detects that they do not follow any users, the website will display all the recent posts. If the user follows any other user, the system will display the recipes of the people followed in the newsfeed of the homepage.

### B.4) Add Posts:
Users can add posts with a simple click of a button. They will be required to insert:
- Images of the final cooked recipe
- Ingredients of the recipe
- Whether the food is vegetarian or not
- A simple description of the recipe

### B.5) Engage with Posts:
Users can engage with posts through liking and commenting. When users click the like button, the system will validate if the person liked the post or not to prevent one user from liking the same post multiple times to keep like counts accurate. Additionally, the system will prevent users from entering an empty comment and will sanitize the comment to prevent SQL injection.

### B.6) Follow and Unfollow:
If a user has not followed an account on the platform, a follow button will be displayed to allow the user to follow the account. After clicking the button, both the user ID and the account ID will be sent to the database to record the following action. Then, an unfollow button will replace the follow button to allow users to reverse the action.

### B.7) Add Items to Cart:
![store](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/49741b9e-213c-4d33-85f7-43c6bd735f32)
Users could store items they want to purchase in the cart available in the online grocery store.
![cart](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/f14edca2-5a1c-45c7-99e9-430256f19bb4)
### B.8) Grocery Store Checkout:
![checkout](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/c9719321-7889-4881-b6d9-a51c6f2c3f2a)
After selecting all the desired items, users will click on a checkout button that redirects them to the checkout page. In the checkout page, users will review the order, then click on the payment button.

### B.9) Make Payment:
The last step of the transaction is done when the user enters his or her credit card information to complete the purchase.

### B.10) Send And Receive Messages:
![messages](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/96f9f714-b21e-462d-9cd0-af311f20d4dd)

Users can send and receive messages through the messages page. The feature is added to increase the interactivity between users.

### B.11) Ban and Unban Users:
![UsersControlsAdmin](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/33ddf8f0-5cdc-4af8-959b-e1d3ae151cf8)
Only admins will have the privileges to restrict users who violate community guidelines from using the food social media platform.

### B.12) Modify Grocery Store:
![groceryItemsAdmin](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/ba29e1e6-aeb6-4cc7-8a13-2bb9d5aaa784)
Only admins have the privilege to add, delete, and change the price of a pharmacy item from the database.

### B.13) Verify and Unverify Users:
Only admins have the privilege to verify and unverify users from the control panel.

### B.14) Preview Content and Users:
Admins have the same privileges as users to view all the posts and users; however, they have an additional privilege: admins can delete posts that do not match with our community guidelines.
### B.15) Explore Recipes according to Ingredient:
![explorerecipes](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/7e733c89-0fdd-4d83-b29c-47c2cf6e5e08)

## C. Technical Functionalities
- Connecting to database
- Deleting records from the database
- Inserting records into the database
- Using sessions throughout the code
- Validating user input using PHP and JavaScript
- Utilizing an API to dynamically generate recipes based on user-provided ingredients in the request.
## D.Entity Relationship Diagram
![image](https://github.com/ZeyadMahmoudAmrMohamed/YumLink/assets/145808463/13b2fa9f-9464-44d4-941c-fc59022620c8)
