<?php
$content = file_get_contents(__DIR__ . '/profile.php');

$replacements = [
    // Modal states
    "x-data=\"{ page: 'profile', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false, 'isProfileInfoModal': false, 'isProfileAddressModal': false }\"" =>
    "x-data=\"{ page: 'profile', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false, 'isProfileInfoModal': false, 'isProfileAddressModal': false, 'isChangePasswordModal': false }\"",
    
    // Main Avatar
    'src="src/images/user/owner.jpg"' => 'src="<?= htmlspecialchars($_SESSION[\'user_data\'][\'avatar\'] ?: \'src/images/user/owner.jpg\') ?>"',
    
    // Full Name
    'Musharof Chowdhury' => '<?= htmlspecialchars(($_SESSION[\'user_data\'][\'first_name\'] ?? \'\') . \' \' . ($_SESSION[\'user_data\'][\'last_name\'] ?? \'\')) ?>',
    
    // Title / Bio (Top)
    '>
                          Team Manager
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'bio\'] ?? \'\') ?>
                        </p>',
                        
    // Top Address
    '>
                          Arizona, United States
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'city_state\'] ?? \'\') ?>
                        </p>',
                        
    // Personal Information Details
    '>
                          Musharof
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'first_name\'] ?? \'\') ?>
                        </p>',
                        
    '>
                          Chowdhury
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'last_name\'] ?? \'\') ?>
                        </p>',

    '>
                          randomuser@pimjo.com
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'email\'] ?? \'\') ?>
                        </p>',

    '>
                          +09 363 398 46
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'phone\'] ?? \'\') ?>
                        </p>',

    // Address Details
    '>
                          United States
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'country\'] ?? \'\') ?>
                        </p>',
                        
    '>
                          ERT 2489
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'postal_code\'] ?? \'\') ?>
                        </p>',
                        
    '>
                          AS4568384
                        </p>' => '>
                          <?= htmlspecialchars($_SESSION[\'user_data\'][\'tax_id\'] ?? \'\') ?>
                        </p>',
                        
    // Social Links
    'href="index.html"' => 'href="#"', // Maybe they had some hrefs
    
    // Social Links bindings: wait, there are buttons with SVGs for social links
    // The SVGs are hardcoded. We need to wrap them in <a> tags, or just leave the SVGs as they are for now and let the user update the links.
    // Actually, in the template the social buttons are `<button>` tags. Let's convert them to `<a href="...">` dynamically if the link exists.
    
    // Modals Inclusion
    "<?php include __DIR__ . '/src/partials/profile/profile-info-modal.html'; ?><?php include __DIR__ . '/src/partials/profile/profile-address-modal.html'; ?>" =>
    "<?php include __DIR__ . '/src/partials/profile/profile-info-modal.php'; ?><?php include __DIR__ . '/src/partials/profile/profile-address-modal.php'; ?><?php include __DIR__ . '/src/partials/profile/change-password-modal.php'; ?>"
];

$content = str_replace(array_keys($replacements), array_values($replacements), $content);

// Add Security Section before the closing </div> of the main content </div></div></main>
// Specifically, after the "Address" box.
// The "Address" box ends with </div> </div> </div>
$security_section = '
              <!-- Security Section -->
              <div class="p-5 mt-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                  <div>
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 mb-2">
                      Security
                    </h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                      Manage your password and security settings.
                    </p>
                  </div>

                  <button
                    @click="isChangePasswordModal = true"
                    class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto"
                  >
                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z" fill=""></path></svg>
                    Change Password
                  </button>
                </div>
              </div>
            </div>
          </div>
        </main>';

$content = str_replace('            </div>
          </div>
        </main>', $security_section, $content);

file_put_contents(__DIR__ . '/profile.php', $content);
echo "Rewrote profile.php\n";
