217152695
HTML, PHP Final Assignment 
"Diet Buddy" 

Functionality with Internal Databases 
"User", "food_db", "chart_db"

- Allows user to Create/Login to Accounts
- Add, Edit, Delete and View Database Food Items.
- Add Items to Charts Unique to Users (Each User with a unique UID)
- Chart Functionality (Google Charts)


Database Structures:
- "User" - id, user_id, password, date
- "food_db" - food_id, food_item, fat, carb, protein
- "chart_db" - user_id*, food_id*
  - chart_db is associative
