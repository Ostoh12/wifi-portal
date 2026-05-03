<?php
$rounds = [];
for ($i = 30; $i >= 1; $i--) {
    $rounds[] = [
        'round' => 6000 + $i,
        'crash' => number_format(mt_rand(120, 980) / 100, 2) . 'x',
        'winner' => 'Player' . mt_rand(101, 999),
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Oski Bet Aviator</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="hero">
    <h1>✈️ Oski Bet Aviator</h1>
    <p>Fast crash-game inspired portal design (frontend demo).</p>
    <div class="ticker">🤖 Bot Pulse: <span id="botJoined">238</span> users entered in the last minute</div>
  </header>

  <main class="layout">
    <section class="card" id="signupCard">
      <h2>Sign Up</h2>
      <p>Referral bonus: <strong>300 gift bonus</strong></p>
      <form id="signupForm">
        <input type="text" id="signupName" placeholder="Full name" required />
        <input type="email" id="signupEmail" placeholder="Email" required />
        <input type="text" id="refCode" placeholder="Referral code (optional)" />
        <input type="password" id="signupPassword" placeholder="Password" required />
        <button type="submit">Create Account</button>
      </form>
      <p id="signupMessage" class="success"></p>
    </section>

    <section class="card" id="loginCard">
      <h2>User Login</h2>
      <form id="loginForm">
        <input type="email" id="loginEmail" placeholder="Email" required />
        <input type="password" id="loginPassword" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
      <p id="loginMessage" class="success"></p>
    </section>

    <section class="card hidden" id="userPortal">
      <h2>User Portal</h2>
      <p>Top Winner: <strong id="topWinner">SkyMaster_79 ($5,420)</strong></p>
      <h3>Your Bet History</h3>
      <ul id="betHistory" class="list"></ul>
      <h3>Last 30 Rounds</h3>
      <div class="table-wrap">
        <table>
          <thead><tr><th>Round</th><th>Crash</th><th>Winner</th></tr></thead>
          <tbody>
            <?php foreach ($rounds as $row): ?>
              <tr>
                <td><?= htmlspecialchars((string)$row['round']) ?></td>
                <td><?= htmlspecialchars($row['crash']) ?></td>
                <td><?= htmlspecialchars($row['winner']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

    <section class="card" id="adminPortal">
      <h2>Admin Portal</h2>
      <p><strong>Active Users:</strong> <span id="activeUsers">0</span></p>
      <p><strong>Total Staked (next round):</strong> $<span id="staked">0</span></p>
      <p><strong>Predicted Crash (next round):</strong> <span id="nextCrash">1.45x</span></p>
      <button id="refreshAdmin">Refresh Stats</button>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>
