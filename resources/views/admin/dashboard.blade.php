<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Administration | Car Airport Morocco</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-dark: #0f1d36;
            --accent-gold: #c5a059;
            --text-dark: #334155;
            --bg-light: #f8fafc;
            --border-color: #cbd5e1;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            padding-bottom: 5rem;
        }
        
        header {
            background-color: var(--primary-dark);
            color: white;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            color: var(--accent-gold);
        }
        
        .header-links a {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            background: rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: background 0.3s;
        }
        
        .header-links a:hover {
            background: var(--accent-gold);
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        /* Stats Widgets */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            border-left: 4px solid var(--accent-gold);
        }
        
        .stat-card h3 {
            font-size: 0.8rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        
        .stat-card .value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-dark);
        }
        
        /* Layout Grid */
        .admin-grid {
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .panel {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }
        
        .panel h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 0.75rem;
        }
        
        /* Forms styling */
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: #475569;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            outline: none;
            font-family: inherit;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--accent-gold);
        }
        
        .btn-submit {
            background: var(--primary-dark);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            transition: opacity 0.3s;
        }
        
        .btn-submit:hover {
            opacity: 0.9;
        }
        
        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            margin-top: 1rem;
        }
        
        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #475569;
        }
        
        tr:hover {
            background-color: #faf5eb;
        }
        
        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 700;
            display: inline-block;
        }
        
        .badge-pending { background-color: #fef3c7; color: #d97706; }
        .badge-confirmed { background-color: #d1fae5; color: #065f46; }
        .badge-cancelled { background-color: #fee2e2; color: #991b1b; }
        
        .badge-source-whatsapp { background-color: #dcfce7; color: #15803d; }
        .badge-source-web { background-color: #e0f2fe; color: #0369a1; }
        .badge-source-ota { background-color: #f3e8ff; color: #6b21a8; }
        
        /* Alert message */
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            max-width: 600px;
            width: 100%;
            position: relative;
            box-shadow: 0 10px 25px rgba(15, 29, 54, 0.2);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-dark);
        }
    </style>
</head>
<body>

    <header>
        <h1>Car Airport Morocco - Fleet Manager</h1>
        <div class="header-links" style="display: flex; gap: 1rem; align-items: center;">
            <a href="/{{ $locale }}" target="_blank">View Main Site</a>
            <form action="/{{ $locale }}/admin/logout" method="POST" style="margin: 0; padding: 0; display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #fca5a5; font-weight: 600; cursor: pointer; font-size: 0.95rem;">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        
        @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif
        
        <!-- Global Month Selector Bar -->
        <form method="GET" action="" id="monthFilterForm" style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem; background: var(--bg-light); padding: 0.85rem 1.25rem; border-radius: 10px; border: 1px solid var(--border-color);">
            <span style="font-weight: 700; font-size: 0.85rem; color: var(--primary-dark);">📅 Viewing Month:</span>
            <select name="month" onchange="this.form.submit()" style="padding: 0.4rem 0.8rem; border-radius: 6px; border: 1px solid #cbd5e1; font-weight: 600; font-size: 0.88rem; color: var(--primary-dark); cursor: pointer; background: #fff;">
                @foreach($monthOptions as $opt)
                <option value="{{ $opt['value'] }}" {{ $opt['selected'] ? 'selected' : '' }}>{{ $opt['label'] }}</option>
                @endforeach
                <option value="__3m" {{ $selectedMonth === '__3m' ? 'selected' : '' }}>Next 3 Months (combined)</option>
                <option value="__6m" {{ $selectedMonth === '__6m' ? 'selected' : '' }}>Next 6 Months (combined)</option>
            </select>
            <span style="font-size: 0.8rem; color: var(--text-muted);">All panels below reflect the selected month</span>
        </form>

        <!-- Stats Widgets (all filtered by selected month) -->
        <div class="stats-grid" style="margin-bottom: 2rem;">
            <div class="stat-card">
                <h3>Total Fleet Size</h3>
                <div class="value">{{ $cars->sum('quantity') }} Vehicles</div>
            </div>

            <div class="stat-card">
                <h3>Confirmed Bookings</h3>
                <div class="value">{{ $selectedMonthData['bookings'] }} Confirmed</div>
                <div style="font-size:0.78rem;color:var(--text-muted);margin-top:0.25rem;">{{ $filterDate->format('F Y') }}</div>
            </div>

            <div class="stat-card">
                <h3>Pending Bookings</h3>
                <div class="value">{{ $selectedMonthData['pending'] }} Pending</div>
                <div style="font-size:0.78rem;color:var(--text-muted);margin-top:0.25rem;">{{ $filterDate->format('F Y') }}</div>
            </div>

            <div class="stat-card" style="border-left: 4px solid #10b981;">
                <h3>Projected Revenue</h3>
                <div class="value" style="color: #10b981;">{{ number_format($selectedMonthData['revenue']) }} DH</div>
                <div style="font-size:0.78rem;color:var(--text-muted);margin-top:0.25rem;">{{ $filterDate->format('F Y') }} · Confirmed only</div>
            </div>
        </div>

        <div class="stats-grid" style="margin-bottom: 2rem; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
            <div class="stat-card" style="border-left: 4px solid #ef4444;">
                <h3>Monthly Expenses</h3>
                <div class="value" style="color: #ef4444;">{{ number_format($selectedMonthData['expenses']) }} DH</div>
                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.25rem;">Fixed + Manual · {{ $filterDate->format('M Y') }}</div>
            </div>

            <div class="stat-card" style="border-left: 4px solid #c5a059;">
                <h3>Net Projected Profit</h3>
                <div class="value" style="color: {{ $selectedMonthData['net'] >= 0 ? '#c5a059' : '#ef4444' }};">{{ number_format($selectedMonthData['net']) }} DH</div>
                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.25rem;">Revenue − Expenses</div>
            </div>

            <div class="stat-card" style="grid-column: span 2;">
                <h3>Unique Visitors (24h / 7d / 30d) <a href="#" onclick="openVisitsModal()" style="font-size: 0.8rem; text-decoration: underline; margin-left: 0.75rem; color: var(--accent-gold); font-weight: 600;">View Countries & History</a></h3>
                <div class="value" style="font-size: 1.5rem; padding-top: 0.5rem;">
                    <strong>{{ $visits24h }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">last 24h</span>
                    &nbsp;|&nbsp; <strong>{{ $visits7d }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">7 days</span>
                    &nbsp;|&nbsp; <strong>{{ $visits30d }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">30 days</span>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="tabs-navigation" style="display: flex; gap: 1rem; border-bottom: 2px solid var(--border-color); margin-bottom: 2rem; flex-wrap: wrap;">
            <button class="tab-btn active" onclick="switchTab('fleet-tab')" id="btn-fleet-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--primary-dark); border-bottom: 3px solid var(--accent-gold); font-size: 1rem;">🏠 Fleet & Pricing</button>
            <button class="tab-btn" onclick="switchTab('calendar-tab')" id="btn-calendar-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">📅 Live Calendar</button>
            <button class="tab-btn" onclick="switchTab('alerts-tab')" id="btn-alerts-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">⚠️ Warnings <span style="background:red; color:white; padding:1px 5px; border-radius:10px; font-size:0.7rem; font-weight:800; display:inline-block;" id="alerts-count-badge">0</span></button>
            <button class="tab-btn" onclick="switchTab('extras-tab')" id="btn-extras-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">🎁 Optional Extras</button>
            <button class="tab-btn" onclick="switchTab('expenses-tab')" id="btn-expenses-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">💸 Expense Follow-Up</button>
            <button class="tab-btn" onclick="switchTab('bookings-tab')" id="btn-bookings-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">📅 Reservation Log</button>
            <button class="tab-btn" onclick="switchTab('contacts-tab')" id="btn-contacts-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">💬 Contact Messages</button>
            <button class="tab-btn" onclick="switchTab('api-tab')" id="btn-api-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">🔑 API Integration</button>
            <button class="tab-btn" onclick="switchTab('blog-tab')" id="btn-blog-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">📝 Blog & SEO Articles</button>
            <button class="tab-btn" onclick="switchTab('tracking-tab')" id="btn-tracking-tab" style="background: none; border: none; padding: 0.8rem 1.5rem; font-weight: 700; cursor: pointer; color: var(--text-dark); border-bottom: 3px solid transparent; font-size: 1rem; opacity: 0.75;">📊 Tracking & Analytics</button>
        </div>

        <!-- tab: Live Fleet Calendar (Gantt Chart Layout) -->
        <div id="calendar-tab" class="tab-content" style="display:none;">
            <div class="panel" style="margin-bottom: 2rem;">
                <h2>Live Fleet Booking & Availability Calendar</h2>
                <p style="font-size:0.85rem; color:var(--text-muted); margin-bottom:1.5rem;">
                    Visual schedule of all bookings. Color key: 
                    <span style="display:inline-block; width:12px; height:12px; background:#d1fae5; border:1px solid #10b981; border-radius:3px; margin-left:10px;"></span> Confirmed 
                    <span style="display:inline-block; width:12px; height:12px; background:#fef3c7; border:1px solid #f59e0b; border-radius:3px; margin-left:10px;"></span> Pending
                </p>

                <div style="overflow-x:auto;">
                    <div style="min-width: 800px;">
                        <!-- Calendar Header Row -->
                        <div style="display:grid; grid-template-columns: 200px repeat(15, 1fr); border-bottom:2px solid var(--border-color); font-weight:700; text-align:center; padding-bottom:0.5rem; font-size:0.78rem;">
                            <div style="text-align:left; padding-left:0.5rem;">Vehicle Model</div>
                            @for($d = 0; $d < 15; $d++)
                            @php $dayDate = now()->addDays($d); @endphp
                            <div>{{ $dayDate->format('d M') }}</div>
                            @endfor
                        </div>

                        <!-- Grid Rows -->
                        @foreach($cars as $car)
                            @for($unit = 1; $unit <= $car->quantity; $unit++)
                            <div style="display:grid; grid-template-columns: 200px repeat(15, 1fr); border-bottom:1px solid var(--border-color); min-height:50px; align-items:center; font-size:0.8rem; padding:0.25rem 0;">
                                <div style="font-weight:600; padding-left:0.5rem;">
                                    {{ $car->brand }} {{ $car->model }} 
                                    <span style="font-size:0.7rem; color:var(--text-muted); font-weight:normal;">(Unit #{{ $unit }} of {{ $car->quantity }})</span>
                                </div>
                                
                                @php
                                    // Get all active bookings for this vehicle class sorted by booking time
                                    $carBookings = $bookings->filter(fn($b) => $b->car_id === $car->id && $b->status !== 'cancelled')
                                                            ->sortBy('pickup_datetime')
                                                            ->values();
                                @endphp

                                @for($d = 0; $d < 15; $d++)
                                @php 
                                    $dayDate = now()->addDays($d)->startOfDay();
                                    // Assign active bookings to unique units sequentially to avoid overlapping
                                    $hasBooking = null;
                                    $allocatedBookingsCount = 0;
                                    
                                    foreach($carBookings as $b) {
                                        $p = $b->pickup_datetime->copy()->startOfDay();
                                        $r = $b->return_datetime->copy()->endOfDay();
                                        
                                        if ($dayDate->between($p, $r)) {
                                            $allocatedBookingsCount++;
                                            // Assign the Nth overlapping booking to the Nth physical car unit row
                                            if ($allocatedBookingsCount === $unit) {
                                                $hasBooking = $b;
                                                break;
                                            }
                                        }
                                    }
                                @endphp
                                <div style="height:100%; border-left: 1px solid rgba(0,0,0,0.05); display:flex; align-items:center; justify-content:center; padding: 2px;">
                                    @if($hasBooking)
                                    <div style="width:100%; height:80%; border-radius:4px; font-size:0.65rem; font-weight:700; text-align:center; display:flex; align-items:center; justify-content:center;
                                        background: {{ $hasBooking->status === 'confirmed' ? '#d1fae5' : '#fef3c7' }};
                                        color: {{ $hasBooking->status === 'confirmed' ? '#065f46' : '#b45309' }};
                                        border: 1px solid {{ $hasBooking->status === 'confirmed' ? '#10b981' : '#f59e0b' }};"
                                        title="Booking #{{ $hasBooking->booking_reference }} by {{ $hasBooking->customer_name }} ({{ $hasBooking->pickup_datetime->format('d M') }} - {{ $hasBooking->return_datetime->format('d M') }})">
                                        {{ substr($hasBooking->customer_name, 0, 8) }}
                                    </div>
                                    @else
                                    <span style="color:#10b981; font-weight:700; font-size:0.75rem;">✓</span>
                                    @endif
                                </div>
                                @endfor
                            </div>
                            @endfor
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- tab: Maintenance & Service Alerts Tab -->
        <div id="alerts-tab" class="tab-content" style="display:none;">
            <div class="panel" style="margin-bottom: 2rem;">
                <h2>Automated Maintenance & Fleet Inspection Alerts</h2>
                <p style="font-size:0.85rem; color:var(--text-muted); margin-bottom:1.5rem;">
                    According to Moroccan transport regulations: Rental cars require technical inspections at <strong>4 years</strong> (then every 2 years), and mandatory retirement at <strong>5 years</strong>.
                </p>

                <div id="alerts-list-container">
                    @php $alertCount = 0; @endphp
                    
                    @foreach($cars as $car)
                        @php
                            $modelYear  = $car->model_year;
                            $modelMonth = $car->model_month ?? 1;
                            $regDate = $modelYear ? \Carbon\Carbon::create($modelYear, $modelMonth, 1) : null;
                            
                            $firstInspection = $regDate ? $regDate->copy()->addYears(4) : null;
                            $eolDate = $regDate ? $regDate->copy()->addYears(5) : null;
                            
                            $inspAlert = $firstInspection && now()->diffInDays($firstInspection, false) <= 90;
                            $eolAlert = $eolDate && now()->diffInDays($eolDate, false) <= 90;
                        @endphp
                        
                        @if($inspAlert || $eolAlert)
                            @php $alertCount++; @endphp
                            <div style="padding:1rem; border-radius:8px; margin-bottom:1rem; display:flex; align-items:center; gap:1rem;
                                background: {{ $eolAlert ? '#fef2f2' : '#fffbeb' }};
                                border-left: 5px solid {{ $eolAlert ? '#ef4444' : '#f59e0b' }};">
                                <span style="font-size:1.5rem;">{{ $eolAlert ? '🚫' : '🔧' }}</span>
                                <div style="flex-grow:1;">
                                    <h4 style="margin:0; font-size:0.95rem; color:var(--primary-dark);">{{ $car->brand }} {{ $car->model }}</h4>
                                    <p style="margin:2px 0 0 0; font-size:0.82rem; color:var(--text-muted);">
                                        @if($eolAlert)
                                            <strong>Immediate Retirement Alert!</strong> Exceeds the Moroccan mandatory 5-year limit for rental cars (EOL date: {{ $eolDate->format('M Y') }}).
                                        @else
                                            <strong>Technical Inspection Due Soon!</strong> First 4-year inspection threshold is scheduled for {{ $firstInspection->format('M Y') }}.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if($alertCount === 0)
                    <div style="text-align:center; padding:3rem 0; color:var(--text-muted); font-style:italic;">
                        🎉 All vehicles conform to technical standards. No inspections or retirements due in next 90 days.
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- tab 2: Optional Extras Management -->
        <div id="extras-tab" class="tab-content" style="display:none;">
            <div class="admin-grid">
                <!-- Left: Extras Table -->
                <div class="panel">
                    <h2>Optional Extras Catalogue</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($extras as $extra)
                            <tr>
                                <td><strong>{{ $extra->name }}</strong></td>
                                <td><code>{{ $extra->slug }}</code></td>
                                <td><strong>{{ $extra->price }} DH</strong></td>
                                <td>
                                    <span class="badge" style="background: {{ $extra->type === 'per_day' ? '#e0f2fe; color:#0369a1' : '#f3e8ff; color:#6b21a8' }};">
                                        {{ $extra->type === 'per_day' ? '/day' : 'Flat' }}
                                    </span>
                                </td>
                                <td style="font-size:0.8rem; color:#64748b;">{{ $extra->description ?? '—' }}</td>
                                <td>
                                    <a href="#" onclick="openEditExtraModal({{ json_encode($extra) }})" style="color: #c5a059; margin-right: 0.5rem; text-decoration: none; font-weight: 600;">Edit</a>
                                    <form action="/{{ $locale }}/admin/extras/{{ $extra->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this extra?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Right: Add New Extra Form -->
                <div class="panel">
                    <h2>Add New Extra</h2>
                    <form action="/{{ $locale }}/admin/extras" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Display Name</label>
                            <input type="text" name="name" required placeholder="e.g. Full Insurance (CDW)">
                        </div>
                        <div class="form-group">
                            <label>Slug (unique identifier)</label>
                            <input type="text" name="slug" required placeholder="e.g. insurance">
                        </div>
                        <div style="display:flex; gap:1rem;">
                            <div class="form-group" style="flex:1;">
                                <label>Price (DH)</label>
                                <input type="number" name="price" min="0" step="0.01" required placeholder="150">
                            </div>
                            <div class="form-group" style="flex:1;">
                                <label>Charge Type</label>
                                <select name="type">
                                    <option value="per_day">Per Day</option>
                                    <option value="flat">Flat Fee</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description (Optional)</label>
                            <input type="text" name="description" placeholder="e.g. Zero liability coverage for damages">
                        </div>
                        <button type="submit" class="btn-submit">Add Extra</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- tab 1: Fleet & Pricing -->
        <div id="fleet-tab" class="tab-content">
            <!-- Section 1: Fleet Management & Add Car -->
            <div class="admin-grid">
            <div class="panel">
                <h2>Active Fleet Vehicles</h2>
                
                <table>
                    <thead>
                        <tr>
                            <th>Priority</th>
                            <th>Car Model</th>
                            <th>Model Year</th>
                            <th>Category</th>
                            <th>Qty</th>
                            <th>Base Rate</th>
                            <th>Monthly Exp</th>
                            <th>Inspection / EOL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        @php
                            $modelYear  = $car->model_year;
                            $modelMonth = $car->model_month ?? 1;
                            $registrationDate = $modelYear ? \Carbon\Carbon::create($modelYear, $modelMonth, 1) : null;
                            // Morocco: first technical inspection after 4 years, then every 2 years
                            $firstInspection = $registrationDate ? $registrationDate->copy()->addYears(4) : null;
                            $nextInspection  = null;
                            if ($firstInspection) {
                                $nextInspection = $firstInspection->isPast()
                                    ? $firstInspection->copy()->addYears(ceil($firstInspection->diffInYears(now()) / 2) * 2)
                                    : $firstInspection;
                            }
                            // Morocco: rental car mandatory end-of-service at 5 years
                            $eolDate = $registrationDate ? $registrationDate->copy()->addYears(5) : null;
                            $eolDays = $eolDate ? now()->diffInDays($eolDate, false) : null;
                            $inspDays = $nextInspection ? now()->diffInDays($nextInspection, false) : null;
                        @endphp
                        <tr>
                            <td style="text-align:center;">
                                <span style="display:inline-block; width:28px; height:28px; line-height:28px; border-radius:50%; background:var(--primary-dark); color:white; font-size:0.75rem; font-weight:700; text-align:center;">{{ $car->display_order ?? 99 }}</span>
                            </td>
                            <td><strong>{{ $car->brand }} {{ $car->model }}</strong></td>
                            <td>
                                @if($modelYear)
                                    {{ $modelYear }}/{{ str_pad($modelMonth, 2, '0', STR_PAD_LEFT) }}
                                @else
                                    <span style="color:#94a3b8;">—</span>
                                @endif
                            </td>
                            <td>{{ $car->category }}</td>
                            <td>{{ $car->quantity }}</td>
                            <td>{{ $car->base_price }} DH</td>
                            <td>
                                <span style="font-weight:600; color: #ef4444;">
                                    {{ $car->loan_cost + $car->insurance_cost + $car->maintenance_cost + $car->fuel_cost + $car->other_cost }} DH
                                </span>
                            </td>
                            <td style="font-size:0.78rem; min-width:140px;">
                                @if($nextInspection)
                                    <div style="color: {{ $inspDays !== null && $inspDays <= 60 ? '#ef4444' : ($inspDays !== null && $inspDays <= 180 ? '#f59e0b' : '#10b981') }}; font-weight:600;">
                                        🔧 {{ $nextInspection->format('M Y') }}
                                        @if($inspDays !== null && $inspDays <= 60)<span style="font-size:0.7rem;"> ⚠️ Soon</span>@endif
                                    </div>
                                @endif
                                @if($eolDate)
                                    <div style="color: {{ $eolDays !== null && $eolDays <= 90 ? '#ef4444' : ($eolDays !== null && $eolDays <= 365 ? '#f59e0b' : '#64748b') }}; margin-top:2px;">
                                        🚫 EOL: {{ $eolDate->format('M Y') }}
                                        @if($eolDays !== null && $eolDays <= 90)<span style="font-size:0.7rem;"> ⚠️ Retire</span>@endif
                                    </div>
                                @endif
                                @if(!$modelYear)<span style="color:#94a3b8;">No date set</span>@endif
                            </td>
                            <td>
                                <a href="#" id="btn-edit-car-{{ $car->id }}" onclick="openEditModal({{ json_encode($car) }})" style="color: #c5a059; margin-right: 0.5rem; text-decoration: none; font-weight: 600;">Edit</a>
                                <form action="/{{ $locale }}/admin/cars/{{ $car->id }}" method="POST" onsubmit="return confirm('Remove vehicle from database?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight: 600;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Add Vehicle to Fleet</h2>
                <form action="/{{ $locale }}/admin/cars" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="brand" placeholder="e.g. Dacia" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Model Name</label>
                        <input type="text" name="model" placeholder="e.g. Logan" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category">
                            <option value="Economy">Economy</option>
                            <option value="SUV">SUV</option>
                            <option value="Van">Van</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Seats Count</label>
                            <input type="number" name="seats" value="5" min="2" max="15" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Transmission</label>
                            <select name="transmission">
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Fleet Quantity</label>
                            <input type="number" name="quantity" value="1" min="1" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Base Price per Day (DH)</label>
                            <input type="number" name="base_price" placeholder="350" required>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Model Year <span style="font-size:0.72rem; color:var(--text-muted);">(for inspection tracking)</span></label>
                            <input type="number" name="model_year" min="2000" max="{{ date('Y') }}" placeholder="{{ date('Y') }}">
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Model Month</label>
                            <select name="model_month">
                                <option value="">— Select —</option>
                                @foreach(['Jan'=>1,'Feb'=>2,'Mar'=>3,'Apr'=>4,'May'=>5,'Jun'=>6,'Jul'=>7,'Aug'=>8,'Sep'=>9,'Oct'=>10,'Nov'=>11,'Dec'=>12] as $mn => $mv)
                                <option value="{{ $mv }}">{{ $mn }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                            <input type="checkbox" name="ac" checked style="width:auto;"> Include AC
                        </label>
                        <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                            <input type="checkbox" name="allow_overbooking" style="width:auto;"> Allow Overbooking (Overpass limits)
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Static Image URL path</label>
                        <input type="text" name="image_path" placeholder="/images/dacia_logan.jpg">
                    </div>
                    
                    <div class="form-group">
                        <label>Hover MP4 Video URL path</label>
                        <input type="text" name="video_path" placeholder="/videos/dacia_logan.mp4">
                    </div>

                    <div style="margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                        <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">Monthly Operating Expenses (DH)</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.5rem;">
                            <div class="form-group">
                                <label>Loan/Lease Fee</label>
                                <input type="number" name="loan_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Insurance Fee</label>
                                <input type="number" name="insurance_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Service/Maintenance</label>
                                <input type="number" name="maintenance_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Fuel Cost</label>
                                <input type="number" name="fuel_cost" value="0" min="0">
                            </div>
                            <div class="form-group" style="grid-column: span 2;">
                                <label>Other Fees (Taxes, cleaning...)</label>
                                <input type="number" name="other_cost" value="0" min="0">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" style="margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                        <label>Homepage Display Priority <span style="font-size:0.72rem; color:var(--text-muted);">(1 = first, lower number = appears earlier)</span></label>
                        <input type="number" name="display_order" min="1" max="999" value="99">
                    </div>
                    
                    <button type="submit" class="btn-submit">Save New Vehicle</button>
                </form>
            </div>
        </div>

        <!-- Section 2: Seasonal Pricing & Rules -->
        <div class="admin-grid">
            <div class="panel">
                <h2>Active Seasonal Adjustments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Rule Name</th>
                            <th>Vehicle Filter</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Min Days</th>
                            <th>Adjustment</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seasonalPrices as $rule)
                        <tr>
                            <td><strong>{{ $rule->name }}</strong></td>
                            <td>{{ $rule->car ? $rule->car->brand . ' ' . $rule->car->model : 'All Vehicles' }}</td>
                            <td>{{ $rule->start_date }}</td>
                            <td>{{ $rule->end_date }}</td>
                            <td style="text-align:center;"><strong>{{ $rule->min_days ?? 1 }}+ days</strong></td>
                            <td>{{ $rule->adjustment_type == 'percentage' ? 'Percentage' : 'Flat Price Override' }}</td>
                            <td>
                                {{ $rule->adjustment_type == 'percentage' ? ($rule->value > 1.0 ? '+' . (($rule->value - 1.0)*100) . '%' : ($rule->value*100) . '%') : ($rule->value . ' DH') }}
                            </td>
                            <td>
                                <form action="/{{ $locale }}/admin/pricing/{{ $rule->id }}" method="POST" onsubmit="return confirm('Remove this rule?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Add Seasonal Price Rule</h2>
                <form action="/{{ $locale }}/admin/pricing" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Rule Name</label>
                        <input type="text" name="name" placeholder="e.g. Summer Season Peak" required>
                    </div>

                    <div class="form-group">
                        <label>Apply to Vehicle</label>
                        <select name="car_id">
                            <option value="">All Vehicles (Global)</option>
                            @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display:flex; gap:1rem;">
                        <div class="form-group" style="flex:1;">
                            <label>Start Date</label>
                            <input type="date" name="start_date" required>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label>End Date</label>
                            <input type="date" name="end_date" required>
                        </div>
                    </div>

                    <div style="display:flex; gap:1rem;">
                        <div class="form-group" style="flex:1;">
                            <label>Adjustment Type</label>
                            <select name="adjustment_type">
                                <option value="percentage">Percentage Multiplier</option>
                                <option value="flat_rate">Flat Price Override</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label>Value</label>
                            <input type="number" step="0.01" name="value" placeholder="e.g. 1.30 or 400" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Minimum Booking Duration (Days)</label>
                        <input type="number" name="min_days" value="1" min="1" required>
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">Only apply this rule for reservations lasting this number of days or longer.</span>
                    </div>

                    <button type="submit" class="btn-submit">Save Pricing Rule</button>
                </form>
            </div>
        </div>
        </div> <!-- End of fleet-tab -->

        <!-- tab 2: Expense Follow-Up -->
        <div id="expenses-tab" class="tab-content" style="display: none;">
            <div class="admin-grid">
                
                <!-- Left: Automated Fixed Fleet Expenses -->
                <div class="panel">
                    <h2>Fleet Fixed Expenses (Automated)</h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">These expenses (loans & insurance) are calculated automatically based on your active fleet configuration.</p>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Car Model</th>
                                <th>Qty</th>
                                <th>Monthly Loan</th>
                                <th>Monthly Insurance</th>
                                <th>Subtotal (Fixed)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totFixed = 0; @endphp
                            @foreach($cars as $car)
                            @php 
                                $carFixed = ($car->loan_cost + $car->insurance_cost) * $car->quantity;
                                $totFixed += $carFixed;
                            @endphp
                            <tr>
                                <td><strong>{{ $car->brand }} {{ $car->model }}</strong></td>
                                <td>{{ $car->quantity }}</td>
                                <td>{{ number_format($car->loan_cost) }} DH <span style="font-size: 0.75rem; color: var(--text-muted);">/car</span></td>
                                <td>{{ number_format($car->insurance_cost) }} DH <span style="font-size: 0.75rem; color: var(--text-muted);">/car</span></td>
                                <td><strong>{{ number_format($carFixed) }} DH</strong></td>
                            </tr>
                            @endforeach
                            <tr style="background: var(--bg-light); font-weight: 700; border-top: 2px solid var(--border-color);">
                                <td colspan="4" style="text-align: right;">Total Automated Fixed Cost:</td>
                                <td style="color: #ef4444; font-size: 1.1rem;">{{ number_format($totFixed) }} DH</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Right: Log Custom/Variable Expense -->
                <div class="panel">
                    <h2>Log Custom/Variable Expense</h2>
                    <form action="/{{ $locale }}/admin/expenses" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Expense Category</label>
                            <select name="category" required>
                                <option value="maintenance">Maintenance & Service</option>
                                <option value="fuel">Fuel & Gas</option>
                                <option value="loan">Extra Loan Payment</option>
                                <option value="insurance">Extra Insurance Fee</option>
                                <option value="other" selected>Other (Taxes, Cleaning, Parts...)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" placeholder="e.g. Brake pads replacement Dacia" required>
                        </div>
                        <div style="display: flex; gap: 1rem; align-items: flex-end;">
                            <div class="form-group" style="flex: 2;">
                                <label>Amount (DH)</label>
                                <input type="number" step="0.01" name="amount" placeholder="e.g. 450" required>
                            </div>
                            <div class="form-group" style="flex: 2;">
                                <label>Date Spent</label>
                                <input type="date" name="spent_at" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="form-group" style="flex: 1; padding-bottom: 0.75rem;">
                                <label style="display: flex; gap: 0.5rem; align-items: center; cursor: pointer; font-size: 0.8rem; font-weight: 600;">
                                    <input type="checkbox" name="is_recurring" value="1" style="width: auto;"> Recurring?
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Log Expense</button>
                    </form>
                </div>
            </div>

            <!-- Bottom: Custom/Variable Expenses Log -->
            <div class="panel" style="margin-top: 2rem;">
                <h2>Custom/Variable Expenses Log</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totCustomThisMonth = 0; @endphp
                        @foreach($expenses as $exp)
                        @php 
                            if ($exp->spent_at->format('Y-m') === date('Y-m')) {
                                $totCustomThisMonth += $exp->amount;
                            }
                        @endphp
                        <tr>
                            <td>{{ $exp->spent_at->format('Y-m-d') }}</td>
                            <td>
                                <strong>{{ $exp->description }}</strong>
                                @if($exp->is_recurring)
                                    <span style="font-size: 0.65rem; background: #e0f2fe; color: #0369a1; padding: 0.1rem 0.35rem; border-radius: 4px; font-weight: 700; margin-left: 0.5rem;">🔁 RECURRING</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge" style="background: #f1f5f9; color: var(--text-dark); text-transform: uppercase;">
                                    {{ $exp->category }}
                                </span>
                            </td>
                            <td><strong style="color: #ef4444;">{{ number_format($exp->amount) }} DH</strong></td>
                            <td>
                                <form action="/{{ $locale }}/admin/expenses/{{ $exp->id }}" method="POST" onsubmit="return confirm('Delete this expense entry?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Summary Panel -->
                <div style="margin-top: 2.5rem; background: var(--bg-light); border-radius: 12px; padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; border: 1px solid var(--border-color);">
                    <div>
                        <h3 style="font-size: 1.1rem; color: var(--primary-dark);">Budget Breakdown (Current Month)</h3>
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">
                            Fixed: <strong>{{ number_format($totFixed) }} DH</strong> | 
                            Variable: <strong>{{ number_format($totCustomThisMonth) }} DH</strong>
                        </p>
                    </div>
                    <div style="text-align: right;">
                        <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Combined Operating Budget</span>
                        <div style="font-size: 2rem; font-weight: 800; color: #ef4444; line-height: 1;">{{ number_format($totFixed + $totCustomThisMonth) }} DH</div>
                    </div>
                </div>
            </div>
        </div> <!-- End of expenses-tab -->

        <!-- tab 3: Reservation Log -->
        <div id="bookings-tab" class="tab-content" style="display: none;">
            <!-- Section 3: Booking Log -->
            <div class="panel" style="margin-bottom: 5rem;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1.5rem;">
                <h2>Recent Reservation Log</h2>
                <button onclick="openManualBookingModal()" style="background:var(--primary-dark); color:white; border:none; padding:0.6rem 1.2rem; border-radius:6px; font-weight:700; cursor:pointer;">+ Add Manual Booking</button>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Ref</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Car</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Total</th>
                        <th>Source</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td><code>{{ $booking->booking_reference }}</code></td>
                        <td>
                            {{ $booking->customer_name }}
                            @if($booking->extras && count($booking->extras) > 0)
                                <div style="display: flex; flex-wrap: wrap; gap: 0.2rem; margin-top: 0.25rem;">
                                    @foreach($booking->extras as $extra)
                                        <span style="font-size: 0.65rem; padding: 0.1rem 0.3rem; background: #e0f2fe; color: #0369a1; border-radius: 4px; font-weight: bold; text-transform: uppercase;">
                                            {{ $extra == 'insurance' ? 'CDW' : $extra }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->customer_phone) }}" target="_blank">{{ $booking->customer_phone }}</a></td>
                        <td>{{ $booking->car ? $booking->car->brand . ' ' . $booking->car->model : 'Deleted Car' }}</td>
                        <td>{{ $booking->pickup_datetime->format('Y-m-d H:i') }}</td>
                        <td>{{ $booking->return_datetime->format('Y-m-d H:i') }}</td>
                        <td><strong>{{ number_format($booking->total_price) }} DH</strong></td>
                        <td>
                            <span class="badge badge-source-{{ $booking->source == 'website' ? 'web' : ($booking->source == 'whatsapp' ? 'whatsapp' : 'ota') }}">
                                {{ strtoupper($booking->source) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $booking->status }}">
                                {{ strtoupper($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex; gap:0.5rem; align-items:center;">
                                <form action="/{{ $locale }}/admin/bookings/{{ $booking->id }}/status" method="POST" style="display:flex; gap:0.25rem; margin:0;">
                                    @csrf
                                    <select name="status" style="padding: 0.2rem; font-size:0.75rem;">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                    </select>
                                    <button type="submit" style="padding:0.2rem 0.4rem; font-size:0.75rem; background:#cbd5e1; border:none; cursor:pointer; border-radius:4px;">Go</button>
                                </form>
                                <button onclick="openEditBookingModal({{ json_encode($booking) }})" style="padding:0.20rem 0.5rem; font-size:0.75rem; background:#c5a059; color:white; border:none; cursor:pointer; border-radius:4px; font-weight:600; white-space:nowrap;">Edit Details</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div> <!-- End of bookings-tab -->

        <!-- tab 5: Contact Messages -->
        <div id="contacts-tab" class="tab-content" style="display: none;">
            <div class="panel" style="margin-bottom: 5rem;">
                <h2>Customer Contact Messages</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactRequests as $req)
                        <tr>
                            <td>{{ $req->created_at->format('Y-m-d H:i') }}</td>
                            <td><strong>{{ $req->name }}</strong></td>
                            <td><a href="mailto:{{ $req->email }}">{{ $req->email }}</a></td>
                            <td>
                                @if($req->phone)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $req->phone) }}" target="_blank">{{ $req->phone }}</a>
                                @else
                                    <span style="color:var(--text-muted); font-style:italic;">None</span>
                                @endif
                            </td>
                            <td style="max-width: 350px; white-space: normal; word-wrap: break-word;">{{ $req->message }}</td>
                            <td>
                                <form action="/{{ $locale }}/admin/contact-requests/{{ $req->id }}" method="POST" onsubmit="return confirm('Delete this contact message request?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($contactRequests->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center; color: var(--text-muted); font-style: italic;">No contact requests yet.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div> <!-- End of contacts-tab -->

        <!-- tab 6: API Integration Manager -->
        <div id="api-tab" class="tab-content" style="display: none;">
            <div class="admin-grid" style="margin-bottom: 5rem;">
                <div class="panel">
                    <h2>Authorized API Keys</h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">
                        These keys authorize external booking channels (e.g. Booking.com, Expedia) to fetch car availability and push bookings into your dashboard via <code>POST /api/booking</code>. Keep these keys secure.
                    </p>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Partner Name</th>
                                <th>API Key (Token)</th>
                                <th>Discount / Commission</th>
                                <th>Status</th>
                                <th>Generated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apiKeys as $key)
                            <tr>
                                <td><strong>{{ $key->name }}</strong></td>
                                <td><code>{{ $key->key }}</code></td>
                                <td><strong style="color: var(--accent-gold);">{{ $key->discount_percent }}% discount</strong></td>
                                <td>
                                    <span style="background: rgba(16, 185, 129, 0.15); color: #10b981; padding: 0.25rem 0.5rem; border-radius: 4px; font-weight: 600; font-size: 0.75rem;">
                                        Active
                                    </span>
                                </td>
                                <td style="color: var(--text-muted);">{{ $key->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <button type="button" onclick="openEditApiKeyModal({{ json_encode($key) }})" style="color:var(--primary-blue); background:none; border:none; cursor:pointer; font-weight:600; margin-right:15px;">Edit</button>
                                    <form action="/{{ $locale }}/admin/api-keys/{{ $key->id }}" method="POST" onsubmit="return confirm('Revoke this API key? External systems using this key will immediately lose access!')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Revoke Access</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($apiKeys->isEmpty())
                            <tr>
                                <td colspan="6" style="text-align: center; color: var(--text-muted); font-style: italic; padding: 2rem;">
                                    No active API keys generated.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="panel">
                    <h2>Generate API Key</h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">
                        Create new credentials for a partner channel or booking system to interact with your fleet programmatically.
                    </p>
                    
                    <form action="/{{ $locale }}/admin/api-keys" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Partner / Channel Name</label>
                            <input type="text" name="name" placeholder="e.g. Booking.com Integration" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Discount / Commission (%)</label>
                            <input type="number" name="discount_percent" value="0" min="0" max="100" required>
                            <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">The percentage discount applied to rates sent to this partner (e.g. 15% for booking.com).</span>
                        </div>
                        
                        <button type="submit" class="btn-submit">Generate Access Key</button>
                    </form>

                    <div style="margin-top: 2rem; background: var(--bg-light); border: 1px solid var(--border-color); border-radius: 8px; padding: 1.25rem;">
                        <h4 style="margin-top: 0; color: var(--primary-dark); font-size: 0.88rem; margin-bottom: 0.5rem;">💡 API Integration Guide</h4>
                        <p style="font-size: 0.8rem; line-height: 1.5; color: var(--text-muted); margin-bottom: 0.5rem;">
                            To push a reservation from an external channel, they must send a <strong>POST</strong> request to:
                            <br><code>{{ url('/api/booking') }}</code>
                        </p>
                        <p style="font-size: 0.8rem; line-height: 1.5; color: var(--text-muted);">
                            They must include the generated key in the request header:
                            <br><code>X-API-KEY: [Generated Token]</code>
                        </p>
                    </div>
                </div>
            </div>

            <div class="admin-grid" style="margin-bottom: 5rem; border-top: 2px solid var(--border-color); padding-top: 3rem;">
                <div class="panel">
                    <h2>Pull Partners Inventory (Receive Fleet)</h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">
                        Register external partners' booking systems to dynamically pull their available cars, list them on your homepage, and auto-book them on their system.
                    </p>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Priority</th>
                                <th>Partner Agency</th>
                                <th>API Endpoint URL</th>
                                <th>Commission Markup</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partnerSites as $partner)
                            <tr>
                                <td style="text-align:center;">
                                    <span style="display:inline-block; width:28px; height:28px; line-height:28px; border-radius:50%; background:#2563eb; color:white; font-size:0.75rem; font-weight:700; text-align:center;" title="Homepage display priority — edit partner to change">
                                        {{ $partner->display_order ?? 99 }}
                                    </span>
                                </td>
                                <td><strong>{{ $partner->name }}</strong></td>
                                <td><code>{{ $partner->api_url }}</code></td>
                                <td><strong style="color: var(--accent-gold);">+{{ $partner->markup_percent }}%</strong></td>
                                <td>
                                    <span style="background: rgba(16, 185, 129, 0.15); color: #10b981; padding: 0.25rem 0.5rem; border-radius: 4px; font-weight: 600; font-size: 0.75rem;">
                                        Connected
                                    </span>
                                </td>
                                <td>
                                    <button type="button" onclick="openEditPartnerModal({{ json_encode($partner) }})" style="color:var(--primary-blue); background:none; border:none; cursor:pointer; font-weight:600; margin-right:15px;">Edit</button>
                                    <form action="/{{ $locale }}/admin/partner-sites/{{ $partner->id }}" method="POST" onsubmit="return confirm('Remove this partner connection? Their cars will immediately disappear from your homepage!')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($partnerSites->isEmpty())
                            <tr>
                                <td colspan="6" style="text-align: center; color: var(--text-muted); font-style: italic; padding: 2rem;">
                                    No external partner sites connected.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="panel">
                    <h2>Connect Partner Agency</h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">
                        Connect to another agency's API endpoint using the credentials they provided.
                    </p>
                    
                    <form action="/{{ $locale }}/admin/partner-sites" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Agency Name</label>
                            <input type="text" name="name" placeholder="e.g. Casablanca Rentals" required>
                        </div>
                        
                        <div class="form-group">
                            <label>API Endpoint URL (Base endpoint)</label>
                            <input type="url" name="api_url" placeholder="e.g. https://casablanca-rentals.com/api" required>
                        </div>

                        <div class="form-group">
                            <label>API Access Key (X-API-KEY)</label>
                            <input type="text" name="api_key" placeholder="Enter key provided by partner" required>
                        </div>

                        <div class="form-group">
                            <label>Global Commission Markup (%)</label>
                            <input type="number" name="markup_percent" value="10" min="0" max="100" required>
                            <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">Default percentage if category-specific values are not set.</span>
                        </div>

                        <div style="border: 1px solid var(--border-color); border-radius: 6px; padding: 1rem; margin-bottom: 1rem; background: var(--bg-light);">
                            <h4 style="margin: 0 0 0.5rem 0; font-size: 0.85rem; color: var(--primary-dark);">🎯 Dynamic Commission per Class (Optional)</h4>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
                                <div class="form-group">
                                    <label style="font-size:0.75rem;">Economy (%)</label>
                                    <input type="number" name="markup_economy" placeholder="e.g. 10">
                                </div>
                                <div class="form-group">
                                    <label style="font-size:0.75rem;">SUV (%)</label>
                                    <input type="number" name="markup_suv" placeholder="e.g. 12">
                                </div>
                                <div class="form-group">
                                    <label style="font-size:0.75rem;">Van (%)</label>
                                    <input type="number" name="markup_van" placeholder="e.g. 15">
                                </div>
                                <div class="form-group">
                                    <label style="font-size:0.75rem;">Luxury (%)</label>
                                    <input type="number" name="markup_luxury" placeholder="e.g. 20">
                                </div>
                            </div>
                        </div>

                        <div style="border: 1px solid var(--border-color); border-radius: 6px; padding: 1rem; margin-bottom: 1rem; background: var(--bg-light);">
                            <div class="form-group" style="margin-bottom: 0.5rem;">
                                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; font-weight: 700; color: var(--text-dark);">
                                    <input type="checkbox" name="is_affiliate" value="1" style="width: auto; cursor: pointer;" onchange="document.getElementById('addAffiliateUrlGroup').style.display = this.checked ? 'block' : 'none'">
                                    🔗 Affiliate / External Redirect Partner
                                </label>
                                <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">
                                    When checked, WhatsApp CTA is hidden and clicking "Book Online" redirects customers directly to the partner's external website.
                                </span>
                            </div>

                            <div class="form-group" id="addAffiliateUrlGroup" style="display: none; margin-top: 0.5rem;">
                                <label style="font-size: 0.78rem;">Affiliate / External Booking Page URL</label>
                                <input type="url" name="affiliate_url" placeholder="e.g. https://partner-site.com/book?ref=my_affiliate_id">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Allowed Car Brands / Companies (Optional - Comma separated)</label>
                            <input type="text" name="allowed_companies_csv" placeholder="e.g. Hertz, Avis, Sixt, Aircar">
                            <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">Specify allowed brands (e.g. "Hertz, Avis"). Leave empty to allow all brands.</span>
                        </div>

                        <div class="form-group">
                            <label>Homepage Display Priority <span style="font-size:0.72rem; color:var(--text-muted);">(1 = first among partners, higher = later)</span></label>
                            <input type="number" name="display_order" min="1" max="999" value="99">
                        </div>
                        
                        <button type="submit" class="btn-submit">Connect Partner</button>
                    </form>
                </div>
        </div>
        </div>

        <!-- tab 7: Blog & SEO Content Manager -->
        <div id="blog-tab" class="tab-content" style="display: none;">
            <div class="admin-grid" style="margin-bottom: 5rem;">
                <!-- Left: Blog Posts Table -->
                <div class="panel">
                    <h2>Published Blog & SEO Articles</h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">
                        Articles rank on Google search engines to drive organic tourist traffic to your website.
                    </p>

                    <table>
                        <thead>
                            <tr>
                                <th>Article Title</th>
                                <th>Category</th>
                                <th>Lang</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogPosts as $post)
                            <tr>
                                <td>
                                    <strong>{{ $post->title }}</strong>
                                    <div style="font-size:0.75rem; color:var(--text-muted);">/{{ $post->locale }}/blog/{{ $post->slug }}</div>
                                </td>
                                <td>
                                    <span class="badge" style="background:#e0f2fe; color:#0369a1;">
                                        {{ $post->category }}
                                    </span>
                                </td>
                                <td><strong>{{ strtoupper($post->locale) }}</strong></td>
                                <td>
                                    <span style="background: {{ $post->is_published ? 'rgba(16, 185, 129, 0.15)' : '#fee2e2' }}; color: {{ $post->is_published ? '#10b981' : '#ef4444' }}; padding: 0.25rem 0.5rem; border-radius: 4px; font-weight: 600; font-size: 0.75rem;">
                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="/{{ $post->locale }}/blog/{{ $post->slug }}" target="_blank" style="color: #10b981; margin-right: 0.5rem; text-decoration: none; font-weight: 600;">View</a>
                                    <button type="button" onclick="openEditBlogModal({{ json_encode($post) }})" style="color:var(--accent-gold); background:none; border:none; cursor:pointer; font-weight:600; margin-right:0.5rem;">Edit</button>
                                    <form action="/{{ $locale }}/admin/blog-posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Delete this blog post?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight:600;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($blogPosts->isEmpty())
                            <tr>
                                <td colspan="5" style="text-align: center; color: var(--text-muted); font-style: italic; padding: 2rem;">
                                    No blog posts created yet.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Right: Create New Blog Post Form -->
                <div class="panel">
                    <h2>Publish New Blog Article</h2>
                    <form action="/{{ $locale }}/admin/blog-posts" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Article Title</label>
                            <input type="text" name="title" placeholder="e.g. 10 Essential Driving Tips for Marrakech" required>
                        </div>

                        <div style="display: flex; gap: 1rem;">
                            <div class="form-group" style="flex: 1;">
                                <label>Category</label>
                                <select name="category">
                                    <option value="Airport Guide">Airport Guide</option>
                                    <option value="Driving Tips" selected>Driving Tips</option>
                                    <option value="Travel Guide">Travel Guide</option>
                                    <option value="Car Rental Advice">Car Rental Advice</option>
                                </select>
                            </div>
                            <div class="form-group" style="flex: 1;">
                                <label>Language</label>
                                <select name="locale">
                                    <option value="en">English (en)</option>
                                    <option value="fr">Français (fr)</option>
                                    <option value="de">Deutsch (de)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Featured Image URL</label>
                            <input type="text" name="featured_image" placeholder="/images/marrakech_bg.jpg">
                        </div>

                        <div class="form-group">
                            <label>Short Excerpt / Summary</label>
                            <textarea name="excerpt" rows="2" style="width: 100%; padding: 0.7rem; border: 1px solid var(--border-color); border-radius: 6px;" placeholder="Brief 1-2 sentence description shown in preview cards..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Full Content (HTML / Text)</label>
                            <textarea name="content" rows="8" required style="width: 100%; padding: 0.7rem; border: 1px solid var(--border-color); border-radius: 6px;" placeholder="Write article content... You can use HTML tags like <h2>, <p>, <ul>, <li>"></textarea>
                        </div>

                        <div style="border-top: 1px solid var(--border-color); padding-top: 1rem; margin-top: 1rem;">
                            <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">🔍 Search Engine Optimization (SEO)</h3>
                            <div class="form-group">
                                <label>Meta Title (SEO Title)</label>
                                <input type="text" name="meta_title" placeholder="e.g. Marrakech Airport Car Rental Guide 2026">
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <input type="text" name="meta_description" placeholder="e.g. Rent a car at Marrakech Menara Airport without hidden fees...">
                            </div>
                            <div class="form-group">
                                <label>Meta Keywords (Comma separated)</label>
                                <input type="text" name="meta_keywords" placeholder="rent car marrakech, airport car hire morocco">
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 1rem;">
                            <label style="display: flex; gap: 0.5rem; align-items: center; cursor: pointer; font-weight: 600;">
                                <input type="checkbox" name="is_published" value="1" checked style="width: auto;"> Publish Immediately
                            </label>
                        </div>

                        <button type="submit" class="btn-submit">Publish Article</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <!-- Edit Car Modal -->
    <div id="editCarModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Fleet Vehicle</h2>
            <form id="editCarForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="brand" id="edit_brand" required>
                </div>
                <div class="form-group">
                    <label>Model Name</label>
                    <input type="text" name="model" id="edit_model" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" id="edit_category">
                        <option value="Economy">Economy</option>
                        <option value="SUV">SUV</option>
                        <option value="Van">Van</option>
                        <option value="Luxury">Luxury</option>
                    </select>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Seats Count</label>
                        <input type="number" name="seats" id="edit_seats" min="2" max="15" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Transmission</label>
                        <select name="transmission" id="edit_transmission">
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Fleet Quantity</label>
                        <input type="number" name="quantity" id="edit_quantity" min="1" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Base Price per Day (DH)</label>
                        <input type="number" name="base_price" id="edit_base_price" required>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                    <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                        <input type="checkbox" name="ac" id="edit_ac" style="width:auto;"> Include AC
                    </label>
                    <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                        <input type="checkbox" name="allow_overbooking" id="edit_allow_overbooking" style="width:auto;"> Allow Overbooking (Overpass limits)
                    </label>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Model Year <span style="font-size:0.72rem; color:var(--text-muted);">(for inspection tracking)</span></label>
                        <input type="number" name="model_year" id="edit_model_year" min="2000" max="{{ date('Y') }}" placeholder="{{ date('Y') }}">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Model Month</label>
                        <select name="model_month" id="edit_model_month">
                            <option value="">— Select —</option>
                            @foreach(['Jan'=>1,'Feb'=>2,'Mar'=>3,'Apr'=>4,'May'=>5,'Jun'=>6,'Jul'=>7,'Aug'=>8,'Sep'=>9,'Oct'=>10,'Nov'=>11,'Dec'=>12] as $mn => $mv)
                            <option value="{{ $mv }}">{{ $mn }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Static Image URL path</label>
                    <input type="text" name="image_path" id="edit_image_path">
                </div>
                <div class="form-group">
                    <label>Hover MP4 Video URL path</label>
                    <input type="text" name="video_path" id="edit_video_path">
                </div>
                <div style="margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                    <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">Monthly Operating Expenses (DH)</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div class="form-group">
                            <label>Loan/Lease Fee</label>
                            <input type="number" name="loan_cost" id="edit_loan_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Insurance Fee</label>
                            <input type="number" name="insurance_cost" id="edit_insurance_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Service/Maintenance</label>
                            <input type="number" name="maintenance_cost" id="edit_maintenance_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Fuel Cost</label>
                            <input type="number" name="fuel_cost" id="edit_fuel_cost" min="0">
                        </div>
                        <div class="form-group" style="grid-column: span 2;">
                            <label>Other Fees (Taxes, cleaning...)</label>
                            <input type="number" name="other_cost" id="edit_other_cost" min="0">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-submit">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Add Manual Booking Modal -->
    <div id="manualBookingModal" class="modal">
        <div class="modal-content">
            <button onclick="closeManualBookingModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Add Manual Booking</h2>
            <form action="/{{ $locale }}/admin/bookings/manual" method="POST">
                @csrf
                <div class="form-group">
                    <label>Select Car Model</label>
                    <select name="car_id" required>
                        @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} (Rate: {{ $car->base_price }} DH/day)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" name="customer_name" required placeholder="e.g. John Doe">
                </div>
                <div class="form-group">
                    <label>Customer Email (Optional)</label>
                    <input type="email" name="customer_email" placeholder="e.g. john@example.com">
                </div>
                <div class="form-group">
                    <label>Customer Phone (WhatsApp preferred)</label>
                    <input type="tel" name="customer_phone" required placeholder="e.g. +212600988632">
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Location</label>
                        <input type="text" name="pickup_location" value="Marrakech Airport (RAK)" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Location</label>
                        <input type="text" name="return_location" value="Marrakech Airport (RAK)" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Date & Time</label>
                        <input type="datetime-local" name="pickup_datetime" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Date & Time</label>
                        <input type="datetime-local" name="return_datetime" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Total Price (DH)</label>
                        <input type="number" name="total_price" required placeholder="e.g. 1500">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Source</label>
                        <select name="source">
                            <option value="website">Website</option>
                            <option value="whatsapp" selected>WhatsApp</option>
                            <option value="ota">OTA (Agency)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Optional Extras & Add-ons</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; background: #fafafa; padding: 0.75rem; border-radius: 6px; border: 1px solid var(--border-color); margin-bottom: 1rem;">
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="insurance" style="width:auto; cursor:pointer;"> Full Insurance (CDW)
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="gps" style="width:auto; cursor:pointer;"> GPS Navigation
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="child_seat" style="width:auto; cursor:pointer;"> Child Safety Seat
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="additional_driver" style="width:auto; cursor:pointer;"> Additional Driver
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Booking Status</label>
                    <select name="status">
                        <option value="pending">Pending</option>
                        <option value="confirmed" selected>Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Save Booking</button>
            </form>
        </div>
    </div>

    <!-- Edit Booking Modal -->
    <div id="editBookingModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditBookingModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Booking Details</h2>
            <form id="editBookingForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Select Car Model</label>
                    <select name="car_id" id="edit_booking_car_id" required>
                        @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} (Rate: {{ $car->base_price }} DH/day)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" name="customer_name" id="edit_booking_customer_name" required>
                </div>
                <div class="form-group">
                    <label>Customer Email (Optional)</label>
                    <input type="email" name="customer_email" id="edit_booking_customer_email">
                </div>
                <div class="form-group">
                    <label>Customer Phone</label>
                    <input type="tel" name="customer_phone" id="edit_booking_customer_phone" required>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Location</label>
                        <input type="text" name="pickup_location" id="edit_booking_pickup_location" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Location</label>
                        <input type="text" name="return_location" id="edit_booking_return_location" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Date & Time</label>
                        <input type="datetime-local" name="pickup_datetime" id="edit_booking_pickup_datetime" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Date & Time</label>
                        <input type="datetime-local" name="return_datetime" id="edit_booking_return_datetime" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Total Price (DH)</label>
                        <input type="number" name="total_price" id="edit_booking_total_price" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Source</label>
                        <select name="source" id="edit_booking_source">
                            <option value="website">Website</option>
                            <option value="whatsapp">WhatsApp</option>
                            <option value="ota">OTA (Agency)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Optional Extras & Add-ons</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; background: #fafafa; padding: 0.75rem; border-radius: 6px; border: 1px solid var(--border-color); margin-bottom: 1rem;">
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="insurance" id="edit_booking_extra_insurance" style="width:auto; cursor:pointer;"> Full Insurance (CDW)
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="gps" id="edit_booking_extra_gps" style="width:auto; cursor:pointer;"> GPS Navigation
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="child_seat" id="edit_booking_extra_child_seat" style="width:auto; cursor:pointer;"> Child Safety Seat
                        </label>
                        <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; font-weight:600; cursor:pointer; color:#333; margin:0;">
                            <input type="checkbox" name="extras[]" value="additional_driver" id="edit_booking_extra_additional_driver" style="width:auto; cursor:pointer;"> Additional Driver
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Booking Status</label>
                    <select name="status" id="edit_booking_status">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        const locale = "{{ $locale }}";

        function openEditModal(car) {
            document.getElementById('editCarForm').action = '/' + locale + '/admin/cars/update/' + car.id;
            document.getElementById('edit_brand').value = car.brand;
            document.getElementById('edit_model').value = car.model;
            document.getElementById('edit_category').value = car.category;
            document.getElementById('edit_seats').value = car.seats;
            document.getElementById('edit_transmission').value = car.transmission;
            document.getElementById('edit_quantity').value = car.quantity;
            document.getElementById('edit_base_price').value = car.base_price;
            document.getElementById('edit_image_path').value = car.image_path || '';
            document.getElementById('edit_video_path').value = car.video_path || '';
            
            // Checkboxes
            document.getElementById('edit_ac').checked = car.ac == 1;
            document.getElementById('edit_allow_overbooking').checked = car.allow_overbooking == 1;

            // Model year / month
            document.getElementById('edit_model_year').value = car.model_year || '';
            document.getElementById('edit_model_month').value = car.model_month || '';

            // Expenses
            document.getElementById('edit_loan_cost').value = car.loan_cost || 0;
            document.getElementById('edit_insurance_cost').value = car.insurance_cost || 0;
            document.getElementById('edit_maintenance_cost').value = car.maintenance_cost || 0;
            document.getElementById('edit_fuel_cost').value = car.fuel_cost || 0;
            document.getElementById('edit_other_cost').value = car.other_cost || 0;
            document.getElementById('edit_display_order').value = car.display_order ?? 99;

            document.getElementById('editCarModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editCarModal').style.display = 'none';
        }

        function openManualBookingModal() {
            document.getElementById('manualBookingModal').style.display = 'flex';
        }

        function closeManualBookingModal() {
            document.getElementById('manualBookingModal').style.display = 'none';
        }

        function openEditBookingModal(booking) {
            document.getElementById('editBookingForm').action = '/' + locale + '/admin/bookings/update/' + booking.id;
            document.getElementById('edit_booking_car_id').value = booking.car_id;
            document.getElementById('edit_booking_customer_name').value = booking.customer_name;
            document.getElementById('edit_booking_customer_email').value = booking.customer_email || '';
            document.getElementById('edit_booking_customer_phone').value = booking.customer_phone;
            document.getElementById('edit_booking_pickup_location').value = booking.pickup_location;
            document.getElementById('edit_booking_return_location').value = booking.return_location;
            
            // Format datetimes to YYYY-MM-DDTHH:mm local representation
            if (booking.pickup_datetime) {
                const pickup = new Date(booking.pickup_datetime);
                const offset = pickup.getTimezoneOffset();
                const localPickup = new Date(pickup.getTime() - (offset*60*1000));
                document.getElementById('edit_booking_pickup_datetime').value = localPickup.toISOString().slice(0, 16);
            }
            if (booking.return_datetime) {
                const ret = new Date(booking.return_datetime);
                const offset = ret.getTimezoneOffset();
                const localReturn = new Date(ret.getTime() - (offset*60*1000));
                document.getElementById('edit_booking_return_datetime').value = localReturn.toISOString().slice(0, 16);
            }
            
            const extras = booking.extras || [];
            document.getElementById('edit_booking_extra_insurance').checked = extras.includes('insurance');
            document.getElementById('edit_booking_extra_gps').checked = extras.includes('gps');
            document.getElementById('edit_booking_extra_child_seat').checked = extras.includes('child_seat');
            document.getElementById('edit_booking_extra_additional_driver').checked = extras.includes('additional_driver');
            
            document.getElementById('edit_booking_total_price').value = booking.total_price;
            document.getElementById('edit_booking_source').value = booking.source;
            document.getElementById('edit_booking_status').value = booking.status;
            
            document.getElementById('editBookingModal').style.display = 'flex';
        }

        function closeEditBookingModal() {
            document.getElementById('editBookingModal').style.display = 'none';
        }

        function openVisitsModal() {
            document.getElementById('visitsModal').style.display = 'flex';
        }

        function closeVisitsModal() {
            document.getElementById('visitsModal').style.display = 'none';
        }

        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
                btn.style.borderBottom = '3px solid transparent';
                btn.style.opacity = '0.75';
            });
            document.getElementById(tabId).style.display = 'block';
            
            const activeBtn = document.getElementById('btn-' + tabId);
            activeBtn.classList.add('active');
            activeBtn.style.borderBottom = '3px solid var(--accent-gold)';
            activeBtn.style.opacity = '1';
        }

        // Calculate and set the maintenance alert badge count on DOM load
        document.addEventListener('DOMContentLoaded', function() {
            const list = document.getElementById('alerts-list-container');
            if (list) {
                // Count active alerts (excluding the no alerts message container)
                const count = list.children.length;
                const isEmpty = list.innerText.includes('All vehicles conform');
                document.getElementById('alerts-count-badge').innerText = isEmpty ? 0 : count;
            }
        });
        
        // Close modals on background click
        window.onclick = function(event) {
            const editModal = document.getElementById('editCarModal');
            const manualModal = document.getElementById('manualBookingModal');
            const visitsModal = document.getElementById('visitsModal');
            const editExtraModal = document.getElementById('editExtraModal');
            const editPartnerModal = document.getElementById('editPartnerModal');
            const editApiKeyModal = document.getElementById('editApiKeyModal');
            const editBlogModal = document.getElementById('editBlogModal');
            if (event.target == editModal) closeEditModal();
            if (event.target == manualModal) closeManualBookingModal();
            if (event.target == visitsModal) closeVisitsModal();
            if (event.target == editExtraModal) closeEditExtraModal();
            if (event.target == editPartnerModal) closeEditPartnerModal();
            if (event.target == editApiKeyModal) closeEditApiKeyModal();
            if (event.target == editBlogModal) closeEditBlogModal();
        }

        // --- Revenue Month Filter ---
        const revenueData = @json($revenueByMonth);

        function updateRevenueDisplay() {
            const select = document.getElementById('revenueMonthFilter');
            const val = select.value;
            const display = document.getElementById('revenueDisplay');
            const sub = document.getElementById('revenueSubLabel');

            if (val === '3') {
                // Sum next 3 months (indices 0-2)
                const total = revenueData.slice(0, 3).reduce((sum, m) => sum + m.revenue, 0);
                display.innerText = total.toLocaleString('fr-FR') + ' DH';
                sub.innerText = revenueData.slice(0, 3).map(m => m.label).join(' + ');
            } else if (val === '6') {
                const total = revenueData.reduce((sum, m) => sum + m.revenue, 0);
                display.innerText = total.toLocaleString('fr-FR') + ' DH';
                sub.innerText = '6-month total projection';
            } else {
                const idx = parseInt(val);
                const m = revenueData[idx];
                display.innerText = m.revenue.toLocaleString('fr-FR') + ' DH';
                sub.innerText = m.label + ' — Confirmed bookings';
            }
        }

        // --- Edit Extra Modal ---
        function openEditExtraModal(extra) {
            document.getElementById('editExtraForm').action = '/' + locale + '/admin/extras/update/' + extra.id;
            document.getElementById('edit_extra_name').value = extra.name;
            document.getElementById('edit_extra_slug').value = extra.slug;
            document.getElementById('edit_extra_price').value = extra.price;
            document.getElementById('edit_extra_type').value = extra.type;
            document.getElementById('edit_extra_description').value = extra.description || '';
            document.getElementById('editExtraModal').style.display = 'flex';
        }

        function closeEditExtraModal() {
            document.getElementById('editExtraModal').style.display = 'none';
        }

        // --- Edit Partner Modal ---
        function openEditPartnerModal(partner) {
            document.getElementById('editPartnerForm').action = '/' + locale + '/admin/partner-sites/update/' + partner.id;
            document.getElementById('edit_partner_name').value = partner.name;
            document.getElementById('edit_partner_api_url').value = partner.api_url;
            document.getElementById('edit_partner_api_key').value = partner.api_key;
            document.getElementById('edit_partner_markup_percent').value = partner.markup_percent;
            document.getElementById('edit_partner_display_order').value = partner.display_order ?? 99;
            document.getElementById('edit_partner_is_affiliate').checked = partner.is_affiliate == 1;
            document.getElementById('edit_partner_affiliate_url').value = partner.affiliate_url || '';
            document.getElementById('editAffiliateUrlGroup').style.display = partner.is_affiliate == 1 ? 'block' : 'none';
            
            // Populate allowed companies and brands CSV hidden fields
            const allowed = partner.allowed_companies || [];
            document.getElementById('edit_partner_allowed_companies_csv').value = allowed.join(', ');
            const allowedBrands = partner.allowed_brands || [];
            document.getElementById('edit_partner_allowed_brands_csv').value = allowedBrands.join(', ');

            // Load partner companies and brands dynamically via AJAX checklists
            const listContainer = document.getElementById('partner_companies_checklist');
            const brandListContainer = document.getElementById('partner_brands_checklist');

            if (listContainer || brandListContainer) {
                if (listContainer) listContainer.innerHTML = '<span style="font-size: 0.8rem; color: var(--text-muted); grid-column: span 2; font-style: italic;">Fetching partner fleet companies...</span>';
                if (brandListContainer) brandListContainer.innerHTML = '<span style="font-size: 0.8rem; color: var(--text-muted); grid-column: span 2; font-style: italic;">Fetching partner fleet brands...</span>';
                
                fetch(`/${locale}/admin/partner-sites/${partner.id}/companies`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Populate companies list
                            if (listContainer) {
                                if (data.companies && data.companies.length > 0) {
                                    listContainer.innerHTML = '';
                                    data.companies.forEach(company => {
                                        const label = document.createElement('label');
                                        label.style.cssText = 'display:flex; align-items:center; gap:0.5rem; font-size:0.82rem; font-weight:600; cursor:pointer; color:var(--text-dark); margin:0;';
                                        
                                        const isChecked = allowed.includes(company);
                                        label.innerHTML = `
                                            <input type="checkbox" value="${company}" ${isChecked ? 'checked' : ''} onchange="updatePartnerCompaniesCsv()" style="width:auto; cursor:pointer;">
                                            ${company}
                                        `;
                                        listContainer.appendChild(label);
                                    });
                                } else {
                                    listContainer.innerHTML = '<span style="font-size: 0.8rem; color: red; grid-column: span 2; font-style: italic;">No companies found</span>';
                                }
                            }

                            // Populate brands list
                            if (brandListContainer) {
                                if (data.brands && data.brands.length > 0) {
                                    brandListContainer.innerHTML = '';
                                    data.brands.forEach(brand => {
                                        const label = document.createElement('label');
                                        label.style.cssText = 'display:flex; align-items:center; gap:0.5rem; font-size:0.82rem; font-weight:600; cursor:pointer; color:var(--text-dark); margin:0;';
                                        
                                        const isChecked = allowedBrands.includes(brand);
                                        label.innerHTML = `
                                            <input type="checkbox" value="${brand}" ${isChecked ? 'checked' : ''} onchange="updatePartnerBrandsCsv()" style="width:auto; cursor:pointer;">
                                            ${brand}
                                        `;
                                        brandListContainer.appendChild(label);
                                    });
                                } else {
                                    brandListContainer.innerHTML = '<span style="font-size: 0.8rem; color: red; grid-column: span 2; font-style: italic;">No brands found</span>';
                                }
                            }
                        } else {
                            if (listContainer) listContainer.innerHTML = '<span style="font-size: 0.8rem; color: red; grid-column: span 2; font-style: italic;">Failed to load data</span>';
                            if (brandListContainer) brandListContainer.innerHTML = '<span style="font-size: 0.8rem; color: red; grid-column: span 2; font-style: italic;">Failed to load data</span>';
                        }
                    })
                    .catch(err => {
                        if (listContainer) listContainer.innerHTML = '<span style="font-size: 0.8rem; color: red; grid-column: span 2; font-style: italic;">Error fetching fleet data</span>';
                        if (brandListContainer) brandListContainer.innerHTML = '<span style="font-size: 0.8rem; color: red; grid-column: span 2; font-style: italic;">Error fetching fleet data</span>';
                    });
            }

            // Populate category specific markups if present
            const cms = partner.category_markups || {};
            document.getElementById('edit_partner_markup_economy').value = cms.Economy !== undefined ? cms.Economy : '';
            document.getElementById('edit_partner_markup_suv').value = cms.SUV !== undefined ? cms.SUV : '';
            document.getElementById('edit_partner_markup_van').value = cms.Van !== undefined ? cms.Van : '';
            document.getElementById('edit_partner_markup_luxury').value = cms.Luxury !== undefined ? cms.Luxury : '';
            
            document.getElementById('editPartnerModal').style.display = 'flex';
        }

        function updatePartnerCompaniesCsv() {
            const container = document.getElementById('partner_companies_checklist');
            if (!container) return;
            const checked = [];
            container.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                if (cb.checked) {
                    checked.push(cb.value);
                }
            });
            document.getElementById('edit_partner_allowed_companies_csv').value = checked.join(',');
        }

        function updatePartnerBrandsCsv() {
            const container = document.getElementById('partner_brands_checklist');
            if (!container) return;
            const checked = [];
            container.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                if (cb.checked) {
                    checked.push(cb.value);
                }
            });
            document.getElementById('edit_partner_allowed_brands_csv').value = checked.join(',');
        }

        function closeEditPartnerModal() {
            document.getElementById('editPartnerModal').style.display = 'none';
        }

        // --- Edit API Key Modal ---
        function openEditApiKeyModal(apiKey) {
            document.getElementById('editApiKeyForm').action = '/' + locale + '/admin/api-keys/update/' + apiKey.id;
            document.getElementById('edit_apikey_name').value = apiKey.name;
            document.getElementById('edit_apikey_discount_percent').value = apiKey.discount_percent;
            document.getElementById('editApiKeyModal').style.display = 'flex';
        }

        function closeEditApiKeyModal() {
            document.getElementById('editApiKeyModal').style.display = 'none';
        }

        // --- Edit Blog Post Modal ---
        function openEditBlogModal(post) {
            document.getElementById('editBlogForm').action = '/' + locale + '/admin/blog-posts/update/' + post.id;
            document.getElementById('edit_blog_title').value = post.title;
            document.getElementById('edit_blog_category').value = post.category;
            document.getElementById('edit_blog_locale').value = post.locale;
            document.getElementById('edit_blog_featured_image').value = post.featured_image || '';
            document.getElementById('edit_blog_excerpt').value = post.excerpt || '';
            document.getElementById('edit_blog_content').value = post.content || '';
            document.getElementById('edit_blog_meta_title').value = post.meta_title || '';
            document.getElementById('edit_blog_meta_description').value = post.meta_description || '';
            document.getElementById('edit_blog_meta_keywords').value = post.meta_keywords || '';
            document.getElementById('edit_blog_is_published').checked = post.is_published == 1;

            document.getElementById('editBlogModal').style.display = 'flex';
        }

        function closeEditBlogModal() {
            document.getElementById('editBlogModal').style.display = 'none';
        }
    </script>

    <!-- Edit Extra Modal -->
    <div id="editExtraModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditExtraModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Optional Extra</h2>
            <form id="editExtraForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Display Name</label>
                    <input type="text" name="name" id="edit_extra_name" required>
                </div>
                <div class="form-group">
                    <label>Slug (unique identifier)</label>
                    <input type="text" name="slug" id="edit_extra_slug" required>
                </div>
                <div style="display:flex; gap:1rem;">
                    <div class="form-group" style="flex:1;">
                        <label>Price (DH)</label>
                        <input type="number" name="price" id="edit_extra_price" min="0" step="0.01" required>
                    </div>
                    <div class="form-group" style="flex:1;">
                        <label>Charge Type</label>
                        <select name="type" id="edit_extra_type">
                            <option value="per_day">Per Day</option>
                            <option value="flat">Flat Fee</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description (Optional)</label>
                    <input type="text" name="description" id="edit_extra_description">
                </div>
                <button type="submit" class="btn-submit">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Visitor Logs Modal -->
    <div id="visitsModal" class="modal">
        <div class="modal-content" style="max-width: 700px;">
            <button onclick="closeVisitsModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Visitor Analytics</h2>
            
            <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
                <div style="flex: 1; background: var(--bg-light); padding: 1.2rem; border-radius: 8px; border: 1px solid var(--border-color);">
                    <h3 style="font-size: 0.95rem; margin-bottom: 1rem; color: var(--primary-dark);">Top 5 Countries</h3>
                    <table style="width: 100%; border-collapse: collapse;">
                        @foreach($topCountries as $tc)
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                            <td style="padding: 0.5rem 0; font-size: 0.85rem;"><strong>{{ $tc->country }}</strong></td>
                            <td style="padding: 0.5rem 0; font-size: 0.85rem; text-align: right; color: var(--accent-gold); font-weight:700;">{{ $tc->count }} visits</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <h3 style="font-size: 1rem; margin-bottom: 0.75rem; color: var(--primary-dark);">Recent Visit Log (Last 200)</h3>
            <div style="max-height: 250px; overflow-y: auto; border: 1px solid var(--border-color); border-radius: 8px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.8rem;">
                    <thead style="position: sticky; top: 0; background: var(--primary-dark); color: white;">
                        <tr>
                            <th style="padding: 0.5rem; text-align: left;">IP Address</th>
                            <th style="padding: 0.5rem; text-align: left;">Country</th>
                            <th style="padding: 0.5rem; text-align: left;">Visited At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allVisits as $visit)
                        <tr style="border-bottom: 1px solid rgba(0,0,0,0.05); background: white;">
                            <td style="padding: 0.4rem 0.5rem;"><code>{{ $visit->ip_address }}</code></td>
                            <td style="padding: 0.4rem 0.5rem;">{{ $visit->country }}</td>
                            <td style="padding: 0.4rem 0.5rem; color: var(--text-muted);">{{ $visit->visited_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Partner Modal -->
    <div id="editPartnerModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditPartnerModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Partner Settings</h2>
            <form id="editPartnerForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Agency Name</label>
                    <input type="text" name="name" id="edit_partner_name" required>
                </div>
                
                <div class="form-group">
                    <label>API Endpoint URL</label>
                    <input type="url" name="api_url" id="edit_partner_api_url" required>
                </div>

                <div class="form-group">
                    <label>API Access Key (X-API-KEY)</label>
                    <input type="text" name="api_key" id="edit_partner_api_key" required>
                </div>

                <div class="form-group">
                    <label>Global Commission Markup (%)</label>
                    <input type="number" name="markup_percent" id="edit_partner_markup_percent" min="0" max="100" required>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: 6px; padding: 1rem; margin-bottom: 1rem; background: var(--bg-light);">
                    <div class="form-group" style="margin-bottom: 0.5rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; font-weight: 700; color: var(--text-dark);">
                            <input type="checkbox" name="is_affiliate" id="edit_partner_is_affiliate" value="1" style="width: auto; cursor: pointer;" onchange="document.getElementById('editAffiliateUrlGroup').style.display = this.checked ? 'block' : 'none'">
                            🔗 Affiliate / External Redirect Partner
                        </label>
                        <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">
                            When checked, WhatsApp CTA is hidden and clicking "Book Online" redirects customers directly to the partner's external website.
                        </span>
                    </div>

                    <div class="form-group" id="editAffiliateUrlGroup" style="display: none; margin-top: 0.5rem;">
                        <label style="font-size: 0.78rem;">Affiliate / External Booking Page URL</label>
                        <input type="url" name="affiliate_url" id="edit_partner_affiliate_url" placeholder="e.g. https://partner-site.com/book?ref=my_affiliate_id">
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: 6px; padding: 1rem; margin-bottom: 1rem; background: var(--bg-light);">
                    <h4 style="margin: 0 0 0.5rem 0; font-size: 0.85rem; color: var(--primary-dark);">🎯 Dynamic Commission per Class (Optional)</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
                        <div class="form-group">
                            <label style="font-size:0.75rem;">Economy (%)</label>
                            <input type="number" name="markup_economy" id="edit_partner_markup_economy" placeholder="e.g. 10">
                        </div>
                        <div class="form-group">
                            <label style="font-size:0.75rem;">SUV (%)</label>
                            <input type="number" name="markup_suv" id="edit_partner_markup_suv" placeholder="e.g. 12">
                        </div>
                        <div class="form-group">
                            <label style="font-size:0.75rem;">Van (%)</label>
                            <input type="number" name="markup_van" id="edit_partner_markup_van" placeholder="e.g. 15">
                        </div>
                        <div class="form-group">
                            <label style="font-size:0.75rem;">Luxury (%)</label>
                            <input type="number" name="markup_luxury" id="edit_partner_markup_luxury" placeholder="e.g. 20">
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.9rem;">🏢 Filter by Company Name (Suppliers)</label>
                    <input type="hidden" name="allowed_companies_csv" id="edit_partner_allowed_companies_csv">
                    
                    <!-- Dynamic Companies Checklist -->
                    <div id="partner_companies_checklist" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; background: var(--bg-light); padding: 0.75rem; border-radius: 6px; border: 1px solid var(--border-color); margin-top: 0.25rem; max-height: 120px; overflow-y: auto;">
                        <span style="font-size: 0.8rem; color: var(--text-muted); grid-column: span 2; font-style: italic;">Loading partner fleet companies...</span>
                    </div>
                    <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">Select which suppliers' cars from this partner to display. If none are checked, all will be displayed.</span>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.9rem;">🚗 Filter by Car Brand (Manufacturers)</label>
                    <input type="hidden" name="allowed_brands_csv" id="edit_partner_allowed_brands_csv">
                    
                    <!-- Dynamic Brands Checklist -->
                    <div id="partner_brands_checklist" style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem; background: var(--bg-light); padding: 0.75rem; border-radius: 6px; border: 1px solid var(--border-color); margin-top: 0.25rem; max-height: 120px; overflow-y: auto;">
                        <span style="font-size: 0.8rem; color: var(--text-muted); grid-column: span 2; font-style: italic;">Loading partner fleet brands...</span>
                    </div>
                    <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">Select which car brands (e.g. Renault, Dacia) from this partner to display. If none are checked, all will be displayed.</span>
                </div>

                <div class="form-group">
                    <label>Homepage Display Priority <span style="font-size:0.72rem; color:var(--text-muted);">(1 = first among partners, higher = later)</span></label>
                    <input type="number" name="display_order" id="edit_partner_display_order" min="1" max="999" value="99">
                </div>
                
                <button type="submit" class="btn-submit">Save Partner Changes</button>
            </form>
        </div>
    </div>

    <!-- Edit API Key Modal -->
    <div id="editApiKeyModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditApiKeyModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit API Key Settings</h2>
            <form id="editApiKeyForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Partner / Channel Name</label>
                    <input type="text" name="name" id="edit_apikey_name" required>
                </div>
                
                <div class="form-group">
                    <label>Discount / Commission (%)</label>
                    <input type="number" name="discount_percent" id="edit_apikey_discount_percent" min="0" max="100" required>
                </div>
                
                <button type="submit" class="btn-submit">Save API Key Changes</button>
            </form>
        </div>
    </div>

    <!-- Edit Blog Post Modal -->
    <div id="editBlogModal" class="modal">
        <div class="modal-content" style="max-width: 750px;">
            <button onclick="closeEditBlogModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Blog Article</h2>
            <form id="editBlogForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Article Title</label>
                    <input type="text" name="title" id="edit_blog_title" required>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Category</label>
                        <select name="category" id="edit_blog_category">
                            <option value="Airport Guide">Airport Guide</option>
                            <option value="Driving Tips">Driving Tips</option>
                            <option value="Travel Guide">Travel Guide</option>
                            <option value="Car Rental Advice">Car Rental Advice</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Language</label>
                        <select name="locale" id="edit_blog_locale">
                            <option value="en">English (en)</option>
                            <option value="fr">Français (fr)</option>
                            <option value="de">Deutsch (de)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Featured Image URL</label>
                    <input type="text" name="featured_image" id="edit_blog_featured_image">
                </div>

                <div class="form-group">
                    <label>Short Excerpt / Summary</label>
                    <textarea name="excerpt" id="edit_blog_excerpt" rows="2" style="width: 100%; padding: 0.7rem; border: 1px solid var(--border-color); border-radius: 6px;"></textarea>
                </div>

                <div class="form-group">
                    <label>Full Content (HTML / Text)</label>
                    <textarea name="content" id="edit_blog_content" rows="8" required style="width: 100%; padding: 0.7rem; border: 1px solid var(--border-color); border-radius: 6px;"></textarea>
                </div>

                <div style="border-top: 1px solid var(--border-color); padding-top: 1rem; margin-top: 1rem;">
                    <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">🔍 Search Engine Optimization (SEO)</h3>
                    <div class="form-group">
                        <label>Meta Title (SEO Title)</label>
                        <input type="text" name="meta_title" id="edit_blog_meta_title">
                    </div>
                    <div class="form-group">
                        <label>Meta Description</label>
                        <input type="text" name="meta_description" id="edit_blog_meta_description">
                    </div>
                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" name="meta_keywords" id="edit_blog_meta_keywords">
                    </div>
                </div>

                <div class="form-group" style="margin-top: 1rem;">
                    <label style="display: flex; gap: 0.5rem; align-items: center; cursor: pointer; font-weight: 600;">
                        <input type="checkbox" name="is_published" id="edit_blog_is_published" value="1" style="width: auto;"> Publish Article
                    </label>
                </div>

                <button type="submit" class="btn-submit">Save Article Changes</button>
            </form>
        </div>
    </div>

    <!-- ===== tab 8: Tracking & Analytics ===== -->
    <div id="tracking-tab" class="tab-content" style="display: none;">
        <div class="admin-grid" style="grid-template-columns: 1fr 1fr; margin-bottom: 5rem;">

            <!-- Google Tracking Card -->
            <div class="panel">
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1rem;">
                    <span style="font-size:1.8rem;">📊</span>
                    <div>
                        <h2 style="margin:0;">Google Analytics / Tag Manager</h2>
                        <p style="font-size:0.82rem; color:var(--text-muted); margin:0;">Paste the full GTM or GA4 script snippet below. It will be injected inside &lt;head&gt; on every page.</p>
                    </div>
                </div>

                <form method="POST" action="/{{ $locale }}/admin/tracking-settings">
                    @csrf
                    <input type="hidden" name="hotjar_code" value="{{ $settings->get('hotjar_code', '') }}">

                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.78rem; font-weight:700; text-transform:uppercase; color:var(--text-muted); margin-bottom:0.4rem;">Google Tracking Code</label>
                        <textarea name="google_tracking_code" rows="12" placeholder="<!-- Google tag (gtag.js) -->
<script async src=&quot;https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX&quot;></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>" style="width:100%; padding:0.85rem; border:1px solid var(--border-color); border-radius:8px; font-family:monospace; font-size:0.8rem; background:var(--bg-light); color:var(--text-dark); resize:vertical; line-height:1.5;">{{ $settings->get('google_tracking_code', '') }}</textarea>
                        <p style="font-size:0.75rem; color:var(--text-muted); margin-top:0.4rem;">💡 Supports Google Tag Manager (GTM), Google Analytics 4 (GA4), or any other Google script.</p>
                    </div>

                    <button type="submit" class="btn-submit" style="width:100%;">💾 Save Google Tracking Code</button>
                </form>

                @if($settings->get('google_tracking_code'))
                    <div style="margin-top:1rem; padding:0.75rem 1rem; background:rgba(34,197,94,0.1); border:1px solid rgba(34,197,94,0.3); border-radius:8px; display:flex; align-items:center; gap:0.5rem;">
                        <span style="color:#16a34a; font-size:1rem;">✅</span>
                        <span style="font-size:0.82rem; color:#16a34a; font-weight:600;">Google tracking is active on all pages.</span>
                    </div>
                @else
                    <div style="margin-top:1rem; padding:0.75rem 1rem; background:rgba(148,163,184,0.1); border:1px solid var(--border-color); border-radius:8px; display:flex; align-items:center; gap:0.5rem;">
                        <span style="font-size:1rem;">⬜</span>
                        <span style="font-size:0.82rem; color:var(--text-muted);">No Google tracking code saved yet.</span>
                    </div>
                @endif
            </div>

            <!-- Hotjar Card -->
            <div class="panel">
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1rem;">
                    <span style="font-size:1.8rem;">🔥</span>
                    <div>
                        <h2 style="margin:0;">Hotjar Heatmaps & Recordings</h2>
                        <p style="font-size:0.82rem; color:var(--text-muted); margin:0;">Paste the Hotjar tracking script below. It will be injected inside &lt;head&gt; on every page.</p>
                    </div>
                </div>

                <form method="POST" action="/{{ $locale }}/admin/tracking-settings">
                    @csrf
                    <input type="hidden" name="google_tracking_code" value="{{ $settings->get('google_tracking_code', '') }}">

                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.78rem; font-weight:700; text-transform:uppercase; color:var(--text-muted); margin-bottom:0.4rem;">Hotjar Tracking Code</label>
                        <textarea name="hotjar_code" rows="12" placeholder="<!-- Hotjar Tracking Code -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:XXXXXXX,hjsv:6};
        ...
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>" style="width:100%; padding:0.85rem; border:1px solid var(--border-color); border-radius:8px; font-family:monospace; font-size:0.8rem; background:var(--bg-light); color:var(--text-dark); resize:vertical; line-height:1.5;">{{ $settings->get('hotjar_code', '') }}</textarea>
                        <p style="font-size:0.75rem; color:var(--text-muted); margin-top:0.4rem;">💡 Copy the snippet directly from your Hotjar dashboard under Site Settings &rarr; Tracking Code.</p>
                    </div>

                    <button type="submit" class="btn-submit" style="width:100%;">💾 Save Hotjar Code</button>
                </form>

                @if($settings->get('hotjar_code'))
                    <div style="margin-top:1rem; padding:0.75rem 1rem; background:rgba(249,115,22,0.1); border:1px solid rgba(249,115,22,0.3); border-radius:8px; display:flex; align-items:center; gap:0.5rem;">
                        <span style="color:#ea580c; font-size:1rem;">🔥</span>
                        <span style="font-size:0.82rem; color:#ea580c; font-weight:600;">Hotjar is active on all pages.</span>
                    </div>
                @else
                    <div style="margin-top:1rem; padding:0.75rem 1rem; background:rgba(148,163,184,0.1); border:1px solid var(--border-color); border-radius:8px; display:flex; align-items:center; gap:0.5rem;">
                        <span style="font-size:1rem;">⬜</span>
                        <span style="font-size:0.82rem; color:var(--text-muted);">No Hotjar code saved yet.</span>
                    </div>
                @endif
            </div>

        </div>

        <!-- How-to Guide -->
        <div class="panel" style="margin-bottom: 5rem; background: linear-gradient(135deg, rgba(15,29,54,0.04) 0%, rgba(197,160,89,0.06) 100%);">
            <h2 style="margin-bottom:1.5rem;">📋 How to Get Your Tracking Codes</h2>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem;">
                <div>
                    <h3 style="font-size:1rem; font-weight:700; color:var(--primary-blue); margin-bottom:0.75rem;">🔵 Google Analytics 4 (GA4)</h3>
                    <ol style="font-size:0.85rem; color:var(--text-muted); line-height:1.8; padding-left:1.2rem; margin:0;">
                        <li>Go to <strong>analytics.google.com</strong></li>
                        <li>Create or select your property</li>
                        <li>Go to <strong>Admin → Data Streams</strong></li>
                        <li>Click your web stream → <strong>View tag instructions</strong></li>
                        <li>Copy the full <code>&lt;script&gt;...&lt;/script&gt;</code> snippet</li>
                        <li>Paste it in the Google Tracking field above</li>
                    </ol>
                </div>
                <div>
                    <h3 style="font-size:1rem; font-weight:700; color:var(--primary-blue); margin-bottom:0.75rem;">🔴 Google Tag Manager (GTM)</h3>
                    <ol style="font-size:0.85rem; color:var(--text-muted); line-height:1.8; padding-left:1.2rem; margin:0;">
                        <li>Go to <strong>tagmanager.google.com</strong></li>
                        <li>Create or select your container</li>
                        <li>Click <strong>Admin → Install Google Tag Manager</strong></li>
                        <li>Copy the <strong>&lt;head&gt; snippet only</strong></li>
                        <li>Paste it in the Google Tracking field above</li>
                    </ol>
                </div>
                <div>
                    <h3 style="font-size:1rem; font-weight:700; color:var(--primary-blue); margin-bottom:0.75rem;">🔥 Hotjar</h3>
                    <ol style="font-size:0.85rem; color:var(--text-muted); line-height:1.8; padding-left:1.2rem; margin:0;">
                        <li>Go to <strong>hotjar.com</strong> and log in</li>
                        <li>Go to <strong>Sites & Organizations</strong></li>
                        <li>Click <strong>Get Tracking Code</strong> for your site</li>
                        <li>Copy the full tracking script</li>
                        <li>Paste it in the Hotjar field above</li>
                    </ol>
                </div>
                <div>
                    <h3 style="font-size:1rem; font-weight:700; color:var(--primary-blue); margin-bottom:0.75rem;">✅ Google Search Console</h3>
                    <ol style="font-size:0.85rem; color:var(--text-muted); line-height:1.8; padding-left:1.2rem; margin:0;">
                        <li>Go to <strong>search.google.com/search-console</strong></li>
                        <li>Add your property URL</li>
                        <li>Choose <strong>HTML tag verification</strong></li>
                        <li>Copy the <code>&lt;meta name="google-site-verification" ...&gt;</code> tag</li>
                        <li>Paste it in the Google Tracking field above (alongside GA4)</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== end tracking-tab ===== -->

</body>
</html>
