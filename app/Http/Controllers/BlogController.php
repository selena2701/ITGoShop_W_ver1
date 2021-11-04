<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
session_start();

class BlogController extends Controller
{
    public function auth_login() //Kiểm tra việc đăng nhập, không để user truy cập vô hệ thống bằng đường dẫn mà chưa đăng nhập
    {
        // Hàm kiểm tra có admin_id hay không
        $UserId = Session::get('UserId');
        if($UserId)
        {
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('admin')->send(); // Nếu chưa đăng nhập thì quay lại trang login
        }
    }

    public function add_content()
    {
        $this->auth_login();
        return view('admin.add_content');
    }

    public function view_content()
    {
        $this->auth_login();
        $all_content = DB::table('blog')
        ->select('blog.*')
        ->orderby('blog.BlogId', 'desc')->get();
        $manager_blog = view('admin.view_content')->with('all_content', $all_content);
        return view('admin_layout')->with('admin.view_content', $manager_blog);
    }
    public function active_post($BlogId)
    {
        // Câu truy vấn SQL  WHERE 
        DB::table('blog')->where('BlogId', $BlogId)->update(['status'=>1]); // [ ] là cái cột, cái mảng
        Session::put('message','Hiển thị bài viết thành công');
        return Redirect::to('view_content');

    }

    public function unactive_post($BlogId)
    {
        DB::table('blog')->where('BlogId', $BlogId)->update(['status'=>0]); 
        Session::put('message','Ẩn bài viết thành công');
        return Redirect::to('view_content');
    }
    public function save_post(Request $request)
    {
        $data = array();
        $data['Author'] = $request->Author;
        $data['DatePost'] = $request->DatePost;
        $data['Title'] = $request->Title;
        $data['Summary'] = $request->Summary;
        $data['Content'] = $request->Content;
        $data['status'] = $request->status;
        $data['Image'] = $request->Image;
       

        $get_image = $request->file('Image');
        if($get_image == true)
        {
            //rand(0, 99)
            // $new_image_name là tên ảnh, getClientOriginalExtension() là lấy phần mở rộng của ảnh, .png,..
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); //$get_image_name.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); 
            $get_image->move('public/images_upload/blog', $image_name);
            $data['Image'] = $image_name;
            DB::table('blog')->insert($data);
            Session::put('message', 'Thêm bài viết thành công');
            return Redirect::to('add-content');
        }
        
        $data['Image'] = '';
        DB::table('blog')->insert($data);
        Session::put('message', 'Thêm bài viết thành công');
        return Redirect::to('add-content');
    }

    
    public function get_post_info($BlogId)
    {
        $this->auth_login();
        // Lấy hết dữ liệu trong bảng product
        $post_info = DB::table('blog')->where('BlogId',$BlogId)->get();  // first: lấy dòng đầu tiên
        $manager_blog = view('admin.update_content')
        ->with('post_info', $post_info);
        // // biến chứa dữ liệu  $all_product đc gán cho all_product'
        return view('admin_layout')->with('admin.update_content', $manager_blog);
    }

    public function update_post(Request $request, $BlogId)
    {
        $this->auth_login();
        $data = array();
        $data['Author'] = $request->Author;
        $data['DatePost'] = $request->DatePost;
        $data['Title'] = $request->Title;
        $data['Summary'] = $request->Summary;
        $data['Content'] = $request->Content;
        $data['status'] = $request->status;
        $data['Image'] = $request->Image;

        $get_image = $request->file('Image');
        if($get_image == true)
        {
            $image_name = date("Y_m_d_His").'_'.$get_image->getClientOriginalName(); 
            $get_image->move('public/images_upload/blog', $image_name);
            $data['Image'] = $image_name;
        }

        DB::table('blog')->where('BlogId', $BlogId)->update($data);
        Session::put('message', 'Cập nhật bài viết thành công');
        return Redirect::to('view-content');
    }

    public function delete_post($BlogId)
    {
        DB::table('blog')->where('BlogId', $BlogId)->delete();
        Session::put('message', 'Xóa bài viết thành công');
        return Redirect::to('view-content');
    }
    // Kết thúc trang admin 

    // Trang client
    public function blog_detail($BlogId)
    {
        $product_category_list = DB::table('Category')->orderby('CategoryId', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('SubBrand', '!=' , 0)->orderby('BrandId', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('SubBrand', 0)->orderby('BrandId', 'desc')->get();

        $blog_detail = DB::table('blog')
        ->select('blog.*')
        ->where('blog.BlogId', $BlogId)->get();

        

        $related_blog = DB::table('blog')
        ->select('blog.*')
        ->where('blog.BlogId',$BlogId)
        ->whereNotIn('blog.BlogId', [$BlogId])->get();

        return view('client.blog-detail')
        ->with('blog_detail', $blog_detail)
        ->with('related_blog',$related_blog);
    }

    public function bloggrid()
    {
        $all_content = DB::table('blog')
        ->select('blog.*')
        ->orderby('blog.BlogId', 'desc')->get();
        $manager_blog = view('client.bloggrid')->with('all_content', $all_content);
        return view('client.bloggrid', $manager_blog);

    }
}