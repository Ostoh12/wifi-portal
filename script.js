const users = [];
const betHistory = [
  'Round #6012 - Stake: $25 - Cashed out at 2.15x',
  'Round #6011 - Stake: $10 - Cashed out at 1.78x',
  'Round #6010 - Stake: $18 - Lost at 1.22x'
];

const botNames = ['JetBot', 'CrashScout', 'AviatorAI', 'WingPulse', 'SkyChip'];
let activeUsers = 184;
let stakedNext = 3250;

function renderBetHistory() {
  const list = document.getElementById('betHistory');
  list.innerHTML = '';
  betHistory.forEach((item) => {
    const li = document.createElement('li');
    li.textContent = item;
    list.appendChild(li);
  });
}

function updateAdminStats() {
  activeUsers += Math.floor(Math.random() * 7);
  stakedNext += Math.floor(Math.random() * 220);
  const nextCrash = (1 + Math.random() * 6).toFixed(2) + 'x';

  document.getElementById('activeUsers').textContent = activeUsers;
  document.getElementById('staked').textContent = stakedNext.toLocaleString();
  document.getElementById('nextCrash').textContent = nextCrash;
}

document.getElementById('signupForm').addEventListener('submit', (e) => {
  e.preventDefault();
  const name = document.getElementById('signupName').value;
  const email = document.getElementById('signupEmail').value;
  const refCode = document.getElementById('refCode').value.trim();

  users.push({ name, email, bonus: refCode ? 300 : 0 });
  document.getElementById('signupMessage').textContent = refCode
    ? 'Account created. 300 gift bonus added via referral!'
    : 'Account created successfully.';
  e.target.reset();
});

document.getElementById('loginForm').addEventListener('submit', (e) => {
  e.preventDefault();
  document.getElementById('loginMessage').textContent = 'Login successful. Welcome to Oski Bet!';
  document.getElementById('userPortal').classList.remove('hidden');
  renderBetHistory();
});

document.getElementById('refreshAdmin').addEventListener('click', updateAdminStats);

setInterval(() => {
  const bot = botNames[Math.floor(Math.random() * botNames.length)];
  const count = 190 + Math.floor(Math.random() * 80);
  document.getElementById('botJoined').textContent = `${count} (${bot} trending)`;
}, 2800);

updateAdminStats();
