<h1>FixFlow</h1>
<p>This name reflects the flow of the repair process in your store, from receiving devices to completing repairs and archiving them. It’s short, professional, and easy to remember.</p>

<h2>Project Description</h2>
<p><strong>Project Name:</strong> FixFlow</p>
<p><strong>Description:</strong></p>
<p>FixFlow is a comprehensive repair management system designed for stores that offer maintenance services for mobile phones, desktop computers, and laptops. Built using <strong>Laravel</strong> for the backend, <strong>Vue.js</strong> for the frontend, and <strong>Bootstrap</strong> for responsive design, this system streamlines the repair process and enhances customer experience.</p>

<p>The system includes three user roles: <strong>Super Admin</strong>, <strong>Receptionist</strong>, and <strong>Maintenance Technician</strong>. Each role has specific permissions and responsibilities to ensure smooth operations.</p>

<h3>Key Features:</h3>
<ul>
  <li>
    <strong>Device Reception:</strong>
    <ul>
      <li>The receptionist can register a device by entering its specifications and generate a receipt with a unique barcode.</li>
      <li>Customers can track the status of their device using the barcode.</li>
    </ul>
  </li>
  <li>
    <strong>Repair Process Management:</strong>
    <ul>
      <li>Devices go through three stages: <strong>Pending</strong>, <strong>Under Maintenance</strong>, and <strong>Repair Completed</strong>.</li>
      <li>Maintenance technicians can update the status of devices and add repair costs.</li>
    </ul>
  </li>
  <li>
    <strong>Advanced Filtering and Reporting:</strong>
    <ul>
      <li>Create main and sub-categories for devices (e.g., Mobile Phones → Samsung, Huawei).</li>
      <li>Calculate profits for each category or within a specific date range.</li>
    </ul>
  </li>
  <li>
    <strong>Archiving System:</strong>
    <ul>
      <li>Devices that remain unclaimed for 30 days are moved to the archive, which acts as a storage repository.</li>
    </ul>
  </li>
  <li>
    <strong>User Roles and Permissions:</strong>
    <ul>
      <li><strong>Super Admin:</strong> Full control over the system.</li>
      <li><strong>Receptionist:</strong> Handles device reception and customer interaction.</li>
      <li><strong>Maintenance Technician:</strong> Updates repair status and costs.</li>
    </ul>
  </li>
</ul>

<h3>Technologies Used:</h3>
<ul>
  <li><strong>Backend:</strong> Laravel (PHP)</li>
  <li><strong>Frontend:</strong> Vue.js (JavaScript)</li>
  <li><strong>Styling:</strong> Bootstrap</li>
  <li><strong>Database:</strong> MySQL </li>
  <li><strong>Other Tools:</strong> Composer, npm, Git</li>
</ul>

<h3>How to Run the Project:</h3>
<ol>
  <li>Clone the repository:
    <pre><code>git clone https://github.com/your-username/FixFlow.git</code></pre>
  </li>
  <li>Navigate to the project directory:
    <pre><code>cd FixFlow</code></pre>
  </li>
  <li>Install backend dependencies:
    <pre><code>composer install</code></pre>
  </li>
  <li>Install frontend dependencies:
    <pre><code>npm install</code></pre>
  </li>
  <li>Set up the <code>.env</code> file and configure your database settings.</li>
  <li>Run migrations:
    <pre><code>php artisan migrate</code></pre>
  </li>
  <li>Compile frontend assets:
    <pre><code>npm run dev</code></pre>
  </li>
  <li>Start the Laravel development server:
    <pre><code>php artisan serve</code></pre>
  </li>
  <li>Open your browser and visit <code>http://localhost:8000</code> to view the application.</li>
</ol>
