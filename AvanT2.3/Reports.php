<?php
    include 'adds/header.php'
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Reports - Task Hub</title>
    <link rel="stylesheet" href="css/reports.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

    <div class="page-container">
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="home_content">
            <div class="main-content">
                <!-- Main content -->
                <main class="content">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Task Reports</h2>
                            <button class="create-button"><i data-lucide="plus-circle"></i> Create New Report</button>
                        </div>
                        <div class="card-content">
                            <table class="report-table">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Task </th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Creation Date</th>
                                        <th>Task Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Task1</td>
                                        <td>Weekly Progress Report</td>
                                        <td>Summary of team's progress this week</td>
                                        <td>2023-11-20</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Task2</td>
                                        <td>Bug Fix Summary</td>
                                        <td>Overview of resolved issues</td>
                                        <td>2023-11-19</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Task3</td>
                                        <td>Feature Implementation Update</td>
                                        <td>Status of new feature development</td>
                                        <td>2023-11-18</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Task4</td>
                                        <td>Performance Optimization Results</td>
                                        <td>Outcomes of recent optimizations</td>
                                        <td>2023-11-17</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Task5</td>
                                        <td>User Feedback Analysis</td>
                                        <td>Analysis of recent user surveys</td>
                                        <td>2023-11-16</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>