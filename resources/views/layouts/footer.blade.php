                    <!--begin::Footer-->
                    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">&copy 2023</span> {{ config('app.name') }}
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                </svg>
            </span>
        </div>
        <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
        <script src="{{ asset('js/custom/apps/ecommerce/sales/save-order.js') }}"></script>
        <script src="{{ asset('js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('js/custom/widgets.js') }}"></script>
        <script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
        <script src="{{ asset('js/custom/utilities/modals/create-app.js') }}"></script>
        <script src="{{ asset('js/custom/utilities/modals/users-search.js') }}"></script>
        <script src="{{ asset('js/custom/apps/ecommerce/customers/listing/listing.js') }}"></script>
        <script src="{{ asset('js/custom/apps/ecommerce/customers/listing/add.js') }}"></script>
        <script src="{{ asset('js/custom/apps/ecommerce/customers/listing/export.js') }}"></script>
        <script src="{{ asset('js/custom/utilities/modals/create-account.js') }}"></script>
        <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#tax_payers_table').DataTable();

            var dashboard_time = moment().format('LTS');
             document.getElementById('formattedTime').innerText = dashboard_time;

         });
    
         var map_render = L.map('location_map').setView([8.2, 1.1], 10); // Set initial coordinates and zoom level
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map_render);
        </script>
        <script type="text/javascript">
            fetch('fetch.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(tax_payer => {
                    L.marker([tax_payer.Latitute, tax_payer.Longitute]).addTo(map_render)
                        .bindPopup(tax_payer.Fullname); 
                        // Display employee name on click
                });
            });
        </script>

<script>
    $(document).ready(function () {
          $('.search_payer').select2();
    });


    function toggleSearchButton() {
        var inputValue = document.getElementById("searchInput").value;
        var searchButton = document.getElementById("searchButton");
        searchButton.disabled = (inputValue.trim() === "");
    }

    function checkMandatoryFields() {
        var surname = document.getElementById("surname").value;
        var othername = document.getElementById("othername").value; 
        var gender = document.getElementById("gender").value; 
        var telephone_1 = document.getElementById("telephone_1").value;
        var address = document.getElementById("address").value; 
        var zone_name = document.getElementById("zone_name").value; 
        var municipal = document.getElementById("municipal").value; 
        
        var searchButton = document.getElementById("register_submit");
    
    // You can adjust the condition based on your requirements.
    searchButton.hidden = (surname.trim() === "" || othername.trim() === "" || gender.trim() === "" || telephone_1.trim() === "" || address.trim() === "" || zone_name.trim() === "" || municipal.trim() === "");
}
</script>
    </body>
</html>
