@extends('layouts.app')

@section('header')
    Bread Orders
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Enhanced KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-6 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <h3 class="text-sm font-medium text-gray-500">Total Orders</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1">156</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <h3 class="text-sm font-medium text-gray-500">Revenue (Gross)</h3>
                <p class="text-2xl font-bold text-green-700 mt-1">$12,450</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <h3 class="text-sm font-medium text-gray-500">Revenue (Net)</h3>
                <p class="text-2xl font-bold text-green-600 mt-1">$11,900</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <h3 class="text-sm font-medium text-gray-500">Avg. Order Value</h3>
                <p class="text-2xl font-bold text-blue-700 mt-1">$80.00</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <h3 class="text-sm font-medium text-gray-500">Avg. Fulfillment Time</h3>
                <p class="text-2xl font-bold text-purple-700 mt-1">2h 15m</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Quick Links</h3>
                </div>
                <div class="flex flex-col gap-2 mt-2">
                    <a href="{{ route('retail.orders.create') }}" class="text-primary-600 hover:underline">Create Order</a>
                    <a href="#" class="text-primary-600 hover:underline">Export CSV</a>
                    <a href="#" class="text-primary-600 hover:underline">Settings</a>
                </div>
            </div>
        </div>

        <!-- Filters Bar, Bulk Actions Bar, and Orders Table replaced by Livewire -->
        <livewire:orders-table />

        <!-- Order Detail Modal/Panel (hidden by default) -->
        <div id="order-detail-modal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-8 relative">
                <button class="absolute top-4 right-4 text-gray-400 hover:text-gray-700" onclick="document.getElementById('order-detail-modal').classList.add('hidden')">&times;</button>
                <h2 class="text-xl font-bold mb-2">Order #ORD-001 <span class="ml-2 px-2 py-1 rounded bg-green-100 text-green-800 text-xs">Completed</span></h2>
                <div class="mb-4 text-gray-600">Placed on 2024-06-16 &bull; Total: <span class="font-semibold">$45.00</span></div>
                <div class="border-b mb-4"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-1">Customer Info</h3>
                        <div class="text-sm text-gray-600">John Smith<br>john@example.com<br>123 Main St, City</div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-1">Payment & Shipping</h3>
                        <div class="text-sm text-gray-600">Card<br>Delivery<br>Tracking #: 123456</div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-800 mb-1">Items</h3>
                    <ul class="text-sm text-gray-600 list-disc ml-5">
                        <li>White Bread x5 ($25.00)</li>
                        <li>Whole Wheat x3 ($20.00)</li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-800 mb-1">Activity Timeline</h3>
                    <ul class="text-xs text-gray-500 list-disc ml-5">
                        <li>2024-06-16 09:00 - Order placed</li>
                        <li>2024-06-16 09:05 - Payment captured</li>
                        <li>2024-06-16 10:00 - Marked as completed</li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-800 mb-1">Internal Notes & Chat</h3>
                    <textarea class="w-full border rounded p-2 text-sm" rows="2" placeholder="Add a note..."></textarea>
                </div>
                <div class="flex gap-2 justify-end">
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded">Change Status</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Refund</button>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Reship</button>
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Send Email</button>
                </div>
            </div>
        </div>

        <!-- Analytics & Reporting Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 mt-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Analytics & Reporting</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="font-semibold mb-2">Orders Over Time</h4>
                    <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-400">[Chart Placeholder]</div>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">Status Breakdown</h4>
                    <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-400">[Pie Chart Placeholder]</div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div>
                    <h4 class="font-semibold mb-2">Top Customers</h4>
                    <div class="h-32 bg-gray-100 flex items-center justify-center text-gray-400">[Top Customers List]</div>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">Top Products</h4>
                    <div class="h-32 bg-gray-100 flex items-center justify-center text-gray-400">[Top Products List]</div>
                </div>
            </div>
            <div class="mt-8 flex gap-4">
                <button class="bg-primary-600 text-white px-4 py-2 rounded">Download PDF</button>
                <button class="bg-primary-600 text-white px-4 py-2 rounded">Download CSV</button>
            </div>
        </div>

        <!-- Role-Based Access & Audit Log Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 mt-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Role-Based Access & Audit Log</h3>
            <div class="mb-4 text-gray-600">[Role-based controls and audit log will appear here. Only visible to Admins.]</div>
            <div class="h-32 bg-gray-100 flex items-center justify-center text-gray-400">[Audit Log Placeholder]</div>
        </div>
    </div>
</div>
@endsection 