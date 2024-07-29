<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sumup Payment Demo</title>
</head>
<body>
    <h1>Sumup Payment Demo</h1>
    <form action="{{ route('getToken') }}" method="POST">
        @csrf
        <p>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" step="0.01" required>
        </p>
        <p>
            <label for="currency">Currency:</label>
            <select id="currency" name="currency" required>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
                <!-- Add more currencies as needed -->
            </select>
        </p>
        <p>
            <label for="reference">Reference:</label>
            <input type="text" id="reference" name="reference" maxlength="128" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </p>
        <p>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" maxlength="255">
        </p>
        <p>
            <button type="submit">Pay with Sumup</button>
        </p>
    </form>
</body>
</html>
