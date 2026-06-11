<?php require_once __DIR__ . '/includes/auth.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Calendar | TailAdmin - Tailwind CSS Admin Dashboard Template</title>
  
    <link href="build/style.css" rel="stylesheet">
    <script defer src="build/bundle.js"></script>
  </head>
  <body
    x-data="{ page: 'calendar', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
    <?php include __DIR__ . '/includes/preloader.php'; ?>
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
      <?php include __DIR__ . '/includes/sidebar.php'; ?>
      <!-- ===== Sidebar End ===== -->

      <!-- ===== Content Area Start ===== -->
      <div
        class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden"
      >
        <!-- Small Device Overlay Start -->
        <?php include __DIR__ . '/includes/overlay.php'; ?><!-- Small Device Overlay End -->

        <!-- ===== Header Start ===== -->
        <?php include __DIR__ . '/includes/header.php'; ?><!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
          <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
            <!-- Breadcrumb Start -->
            <div x-data="{ pageName: `Calendar`}">
              <?php include __DIR__ . '/includes/breadcrumb.php'; ?></div>
            <!-- Breadcrumb End -->

            <div
              class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
            >
              <div id="calendar" class="min-h-screen"></div>
            </div>

            <!-- BEGIN MODAL -->
            <?php include __DIR__ . '/includes/calendar-event-modal.php'; ?><!-- END MODAL -->
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
  </body>
</html>
