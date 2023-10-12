@extends('admin.admin_master')
@section('admin')


    <div class="wrap" style="margin: 30px;">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Search By Date</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('search.by.date') }}">
                            @csrf
                            <div class="form-group">
                                <h5>Select Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="date" name="date" class="form-control" >
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="text-xs-right my-2">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Search By Month</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('search.by.month') }}">
                            @csrf
                            <div class="form-group">
                                <h5>Select Month  <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="month" class="form-control">
                                        <option label="Choose One"></option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="Jun">Jun</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('month')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <h5>Select Year  <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="year_name" class="form-control">
                                        <option label="Choose One"></option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2026">2027</option>
                                        <option value="2026">2028</option>
                                        <option value="2026">2029</option>
                                        <option value="2026">2030</option>
                                        <option value="2026">2031</option>
                                        <option value="2026">2032</option>
                                        <option value="2026">2033</option>
                                        <option value="2026">2034</option>
                                        <option value="2026">2035</option>
                                        <option value="2026">2036</option>
                                        <option value="2026">2037</option>
                                        <option value="2026">2038</option>
                                        <option value="2026">2039</option>
                                        <option value="2026">2040</option>
                                        <option value="2026">2041</option>
                                        <option value="2026">2042</option>
                                        <option value="2026">2043</option>
                                        <option value="2026">2044</option>
                                        <option value="2026">2045</option>
                                        <option value="2026">2046</option>
                                        <option value="2026">2047</option>
                                        <option value="2026">2048</option>
                                        <option value="2026">2049</option>
                                        <option value="2026">2050</option>
                                    </select>
                                    @error('year_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-xs-right my-2">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Select Year</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('search.by.year') }}" >
                            @csrf
                            <div class="form-group">
                                <h5>Select Year  <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="year" class="form-control">
                                        <option label="Choose One"></option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2026">2027</option>
                                        <option value="2026">2028</option>
                                        <option value="2026">2029</option>
                                        <option value="2026">2030</option>
                                        <option value="2026">2031</option>
                                        <option value="2026">2032</option>
                                        <option value="2026">2033</option>
                                        <option value="2026">2034</option>
                                        <option value="2026">2035</option>
                                        <option value="2026">2036</option>
                                        <option value="2026">2037</option>
                                        <option value="2026">2038</option>
                                        <option value="2026">2039</option>
                                        <option value="2026">2040</option>
                                        <option value="2026">2041</option>
                                        <option value="2026">2042</option>
                                        <option value="2026">2043</option>
                                        <option value="2026">2044</option>
                                        <option value="2026">2045</option>
                                        <option value="2026">2046</option>
                                        <option value="2026">2047</option>
                                        <option value="2026">2048</option>
                                        <option value="2026">2049</option>
                                        <option value="2026">2050</option>
                                    </select>
                                    @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-xs-right my-2">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
