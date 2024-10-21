@extends('FE.layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carbon Tracking and Verification</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #e8f5e9;
            }

            header {
                background-color: #388e3c;
                padding: 1em;
                text-align: center;
                color: white;
            }

            .container {
                width: 80%;
                margin: 2em auto;
                background-color: white;
                padding: 2em;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                color: #388e3c;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            label {
                margin-bottom: 0.5em;
                color: #333;
            }

            input,
            select {
                padding: 0.8em;
                margin-bottom: 1em;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 1em;
            }

            button {
                padding: 1em;
                background-color: #388e3c;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 1em;
            }

            button:hover {
                background-color: #2e7d32;
            }

            .tracking-summary {
                margin-top: 2em;
                padding: 1em;
                background-color: #c8e6c9;
                border-left: 5px solid #388e3c;
            }

            .tracking-list {
                list-style: none;
                padding: 0;
                margin: 1em 0;
            }

            .tracking-list li {
                margin-bottom: 1em;
                padding: 1em;
                background-color: #f1f8e9;
                border-left: 5px solid #81c784;
            }
        </style>
    </head>

    <body>

        <header>
            <h1>Carbon Neutral Activity Tracker</h1>
        </header>

        <div class="container">
            <h1>Track and Verify Your Carbon Neutral Activities</h1>
            <p>Log your tree planting activity by uploading an image and sharing the Google Maps link where the tree was
                planted for verification.</p>

            <!-- Form to log carbon neutral activities -->
            <form id="trackingForm" enctype="multipart/form-data">
                <label for="method">Select Carbon Neutralization Method:</label>
                <select id="method" name="method" required>
                    <option value="trees">Planting Trees</option>
                    <option value="solar">Solar Panel Installation</option>
                    <option value="wind">Wind Energy</option>
                    <option value="other">Other</option>
                </select>

                <label for="quantity">Quantity (e.g., Number of Trees):</label>
                <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" min="1" required>

                <label for="location">Google Maps Link (Location of Tree Planting):</label>
                <input type="url" id="location" name="location" placeholder="Paste the Google Maps link" required>

                <button type="submit">Track and Verify Activity</button>
            </form>

            <!-- Tracking summary -->
            <div class="tracking-summary">
                <h2>Your Carbon Impact</h2>
                <p>Potential Total Credits Earned: <strong><span id="totalCredits">0</span></strong></p>
                <ul class="tracking-list" id="activityList">
                    <!-- List of tracked activities will appear here -->
                </ul>
            </div>
        </div>

        <script>
            // JavaScript to handle form submission and activity tracking
            document.getElementById('trackingForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form from submitting normally

                // Get form values
                const method = document.getElementById('method').value;
                const quantity = parseInt(document.getElementById('quantity').value);
                const location = document.getElementById('location').value;

                // Basic credit calculation based on method
                let credits = 0;
                if (method === 'trees') {
                    credits = quantity * 10; // Example: 10 credits per tree
                } else if (method === 'solar') {
                    credits = quantity * 5; // Example: 5 credits per KW from solar
                } else if (method === 'wind') {
                    credits = quantity * 8; // Example: 8 credits per wind energy
                } else {
                    credits = quantity * 3; // Other methods give 3 credits per unit
                }

                // Update total credits
                const totalCreditsElement = document.getElementById('totalCredits');
                const currentCredits = parseInt(totalCreditsElement.innerText);
                totalCreditsElement.innerText = currentCredits + credits;

                // Display the tracked activity in the activity list
                const activityList = document.getElementById('activityList');
                const newActivity = document.createElement('li');
                newActivity.innerHTML =
                    `Tracked ${quantity} units of ${method}, earned ${credits} credits. Location: <a href="${location}" target="_blank">${location}</a>`;
                activityList.appendChild(newActivity);

                // Optionally clear form fields after submission
                document.getElementById('trackingForm').reset();
            });
        </script>

    </body>

    </html>
@endsection
