# Web-Systems-Final-Act-1

This project is a simple PHP application that allows users to select a month and a day of the week, and then displays the number of weeks in that month and the occurrences of the selected day within that month.

## Requirements

- XAMPP (or any other local server environment that supports PHP)
- Web browser

## Installation

1. **Download and Install XAMPP:**
   - Download XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).
   - Follow the installation instructions for your operating system.

2. **Clone or Download the Project:**
   - Clone this repository or download the ZIP file and extract it.

3. **Move the Project to XAMPP's `htdocs` Directory:**
   - Copy the `capalac-final-act1.php` file to the `htdocs` directory of your XAMPP installation. The default location for `htdocs` is usually:
     - Windows: `C:\xampp\htdocs\`
     - macOS: `/Applications/XAMPP/htdocs/`
     - Linux: `/opt/lampp/htdocs/`

## Usage

1. **Start XAMPP:**
   - Open the XAMPP Control Panel.
   - Start the Apache server by clicking the "Start" button next to "Apache".

2. **Access the Application:**
   - Open your web browser.
   - Navigate to `http://localhost/capalac-final-act1.php`.

3. **Select Month and Day:**
   - Use the form to select a month and a day of the week.
   - Click the "Show Date" button.

4. **View Results:**
   - The application will display the number of weeks in the selected month and the occurrences of the selected day within that month.

## Code Explanation

- **Form Display:**
  - The `displayForm($selectedMonth, $selectedDay)` function generates an HTML form for selecting a month and a day of the week.

- **Form Handling:**
  - The script checks if the selected month and day are valid using the `isValidMonth($selectedMonth)` and `isValidDay($selectedDay)` functions.
  - If valid, it calculates the total days in the selected month using `getTotalDaysInMonth($selectedMonth, $currentYear)`.
  - It calculates the total weeks in the month using `getTotalWeeksInMonth($totalDays)`.
  - It finds the occurrences of the selected day in the month using `getDayOccurrencesInMonth($selectedMonth, $selectedDay, $currentYear)`.

- **Result Display:**
  - The `displayResults($monthName, $day, $totalWeeks, $dayOccurrences)` function displays the results, including the number of weeks and the dates of the selected day in the month.

## Functions

- `displayForm($selectedMonth, $selectedDay)`: Displays the form for selecting month and day.
- `getMonthName($month)`: Returns the name of the month.
- `getDayName($dayNumber)`: Returns the name of the day.
- `isValidMonth($month)`: Validates the selected month.
- `isValidDay($day)`: Validates the selected day.
- `getTotalDaysInMonth($month, $year)`: Returns the total number of days in the month.
- `getTotalWeeksInMonth($totalDays)`: Returns the total number of weeks in the month.
- `getDayOccurrencesInMonth($month, $day, $year)`: Returns the occurrences of the selected day in the month.
- `displayResults($monthName, $day, $totalWeeks, $dayOccurrences)`: Displays the results.

## License

This project is not lincensed nor associated with any. Just a personal and educational purposes. Feel free to use as a reference.