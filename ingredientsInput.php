<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ingredients Input</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>
<link rel="stylesheet" href="./assets/css/ingStyle.css" />    
</head>
<body>
    <div class="todo-app">
        <h1>Ingredients Input</h1>
        <form action="" id="task-form">
            <input
                type="text"
                id="task-input"
                placeholder="Enter a New Ingredient"
            />
            <button class="btn" type="submit">
                <i class="fas fa-plus"></i>
            </button>
            <button id="submit-btn" class="btn" type="button" disabled>
                Submit
            </button>
        </form>
        <ul id="task-list"></ul>
    </div>
    
    <script>
        const taskInput = document.getElementById("task-input");
        const taskForm = document.getElementById("task-form");
        const taskList = document.getElementById("task-list");
        const suggestedIngredients = ['tomato', 'tomatoe', 'lettuce', 'apple'];
        let addedIngredients = new Set(); // Set to store added ingredients

        // Function to suggest ingredients based on user input
        taskInput.addEventListener("input", () => {
            const userInput = taskInput.value.toLowerCase();
            const suggested = suggestedIngredients.filter(ingredient =>
                ingredient.toLowerCase().startsWith(userInput)
            );
            // Show suggestions based on user input
            if (userInput && suggested.length > 0) {
                console.log("Suggestions:", suggested);
                // Display the first suggested ingredient
                taskInput.value = suggested[0];
            }
        });

        taskForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const taskTitle = taskInput.value.trim();

            if (taskTitle === "") {
                alert("Please Enter Task");
            } else if (!suggestedIngredients.includes(taskTitle)) {
                alert(`Ingredient '${taskTitle}' not found in the list.`);
            } else if (addedIngredients.has(taskTitle)) {
                alert(`Ingredient '${taskTitle}' is already added.`);
            } else {
                const listItem = document.createElement("li");
                listItem.textContent = taskTitle;
                taskList.appendChild(listItem);
                addedIngredients.add(taskTitle); // Add to the set
                taskInput.value = "";
                saveListData();
            }
        });

        taskList.addEventListener("click", (e) => {
            if (e.target.tagName === "LI") {
                const ingredientText = e.target.textContent.trim();
                addedIngredients.delete(ingredientText); // Remove from the set
                e.target.remove();
                saveListData();
            }
        });

        function showListData() {
            taskList.innerHTML = localStorage.getItem("listItem");
            addedIngredients = new Set(); // Reset the set
            // Add items from taskList to addedIngredients set
            const items = taskList.getElementsByTagName('li');
            for (let item of items) {
                addedIngredients.add(item.textContent.trim());
            }
        }

        function saveListData() {
            localStorage.setItem("listItem", taskList.innerHTML);
        }

        showListData();

        const submitBtn = document.getElementById("submit-btn");
        submitBtn.addEventListener("click", () => {
            let finalList = addedIngredients;  
            
            // taskList.innerHTML = ""; // Reset the <ul> in HTML
            // addedIngredients.clear(); // Clear the set
            // saveListData(); // Save empty list to localStorage if needed
            // submitBtn.disabled = true; // Disable the submit button
            const itemList = Array.from(finalList).join(",");
            console.log(itemList);
            window.location.href = `homepage.php?items=${itemList}`;
            
        });

        function toggleSubmitButton() {
            submitBtn.disabled = addedIngredients.size === 0;
        }

        taskForm.addEventListener("submit", (e) => {
            toggleSubmitButton();
        });

        taskList.addEventListener("click", (e) => {
            toggleSubmitButton();
        });
    </script>
</body>
</html>