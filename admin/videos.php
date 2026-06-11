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
    <title>Videos | TailAdmin - Tailwind CSS Admin Dashboard Template</title>
  
    <link href="build/style.css" rel="stylesheet">
    <script defer src="build/bundle.js"></script>
  </head>
  <body
    x-data="{ page: 'videos', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
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
        class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto"
      >
        <!-- Small Device Overlay Start -->
        <?php include __DIR__ . '/includes/overlay.php'; ?><!-- Small Device Overlay End -->

        <!-- ===== Header Start ===== -->
        <?php include __DIR__ . '/includes/header.php'; ?><!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
          <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
            <!-- Breadcrumb Start -->
            <div x-data="{ pageName: `Videos`}">
              <?php include __DIR__ . '/includes/breadcrumb.php'; ?></div>
            <!-- Breadcrumb End -->
            <div class="grid grid-cols-1 gap-5 sm:gap-6 xl:grid-cols-2">
              <div class="space-y-5 sm:space-y-6">
                <div
                  class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
                >
                  <div
                    class="px-6 py-5 border-b border-gray-200 dark:border-gray-800"
                  >
                    <h3
                      class="text-base font-medium text-gray-800 dark:text-white/90"
                    >
                      Video Ratio 16:9
                    </h3>
                  </div>
                  <div class="p-4 sm:p-6">
                    <?php include __DIR__ . '/src/partials/video/video-01.html'; ?></div>
                </div>
                <div
                  class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
                >
                  <div
                    class="px-6 py-5 border-b border-gray-200 dark:border-gray-800"
                  >
                    <h3
                      class="text-base font-medium text-gray-800 dark:text-white/90"
                    >
                      Video Ratio 4:3
                    </h3>
                  </div>
                  <div class="p-4 sm:p-6">
                    <?php include __DIR__ . '/src/partials/video/video-02.html'; ?></div>
                </div>
              </div>
              <div class="space-y-5 sm:space-y-6">
                <div
                  class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
                >
                  <div
                    class="px-6 py-5 border-b border-gray-200 dark:border-gray-800"
                  >
                    <h3
                      class="text-base font-medium text-gray-800 dark:text-white/90"
                    >
                      Video Ratio 4:3
                    </h3>
                  </div>
                  <div class="p-4 sm:p-6">
                    <?php include __DIR__ . '/src/partials/video/video-02.html'; ?></div>
                </div>
                <div
                  class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
                >
                  <div
                    class="px-6 py-5 border-b border-gray-200 dark:border-gray-800"
                  >
                    <h3
                      class="text-base font-medium text-gray-800 dark:text-white/90"
                    >
                      Video Ratio 1:1
                    </h3>
                  </div>
                  <div class="p-4 sm:p-6">
                    <?php include __DIR__ . '/src/partials/video/video-04.html'; ?></div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
  </body>
</html>
