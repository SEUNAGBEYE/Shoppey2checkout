<div class="row">
@extends('layouts.master')
@section('contents')
    <div class="page-content">
              <div class="col-md-2" style="border: 1px solid #ddd; border-radius: 10px; margin-left: 10px; background-color: #e5e4e2;">
                <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">
                        <!-- Main menu -->
                        <li class="current"><a href="{{ 'dashboard' }}" style="color: #000;"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                        <li><a href="{{ 'viewUsers' }}" style="color: #000;"><i class="glyphicon glyphicon-user"></i>User</a></li>
                        <li><a href="{{ 'viewOrders' }}" style="color:#000;"><i class="glyphicon glyphicon-briefcase"></i> Incoming Orders</a></li>
                        <li><a href="{{ 'addAdmin' }}" style="color: #000;"><i class="glyphicon glyphicon-user"></i> Add Admin</a></li>
                        <li><a href="{{ 'viewProduct' }}" style="color: #000;"><i class="glyphicon glyphicon-record"></i> Products </a></li>
                        
                    </ul>
                </div>
        </div>
    </div>    
@endsection('contents')