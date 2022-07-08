<script language="javaScript">
    $(document).on("load", function() {
        $.ajax({
            url: "http://192.168.0.127:8000/grafana/d/64nrElFmk/j-a-r-v-i-s-monitoring",
            type: "GET",
            contentType: 'application/json',
            beforeSend: function(xhr){
                xhr.setRequestHeader('Authorization', 'Bearer eyJrIjoiMlJvYkZ4U3RUVFZZQUNzUUEycjN3TGdGSUN0TmdMeDQiLCJuIjoiamFydmlzIiwiaWQiOjF9');
            },
            success: function(data) { 
                var iframeDoc = $("#grafana_dashboard").get(0).contentDocument;
                iframeDoc.open();
                iframeDoc.write(data);
                iframeDoc.close();
                $("#grafana_dashboard").get(0).contentWindow.on("unload", function(e) {
                    debugger;
                    $.removeCookie('grafana_dashboard_loaded');
                });
            }
        });
    })

    function loadDashboard () {
        if ($.cookie("grafana_dashboard_loaded") !== "true") {
            document.cookie = "grafana_dashboard_loaded=true";
            setTimeout(() => {
                document.getElementById('grafana_dashboard').src = "http://192.168.0.127:8000/grafana/d/64nrElFmk/j-a-r-v-i-s-monitoring?kiosk";
            }, 150)
        }
    }
</script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue border-b border-gray-200">
                    <iframe name="grafana_dashboard" id="grafana_dashboard" src="about:blank" onLoad="loadDashboard();" sandbox="allow-forms allow-popups allow-same-origin allow-scripts" width=100% height=800></iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>