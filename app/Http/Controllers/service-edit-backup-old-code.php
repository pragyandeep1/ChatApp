public function update_service(Request $request,$id){
        $data = $request->all();
        // echo '<pre>';print_r($data);exit();
        $servicedata = Service::find($id);
        $faqdata = Faq::where('service_id',$id)->get();
        $seller_info = Sellerinfo::where('company_name', '=', $servicedata->seller_name)->first();
        // $seller_info = Sellerinfo::where('company_name', '=', DB::raw("'" . $servicedata->seller_name . "'"))->first();


        $servicedata->type = $request->type ;        
        $servicedata->seller_name = $request->seller_name;
        $servicedata->category_id = $request->category_id;
        $servicedata->address = $request->address;
        $servicedata->phone= $request->phone;
        $servicedata->is_whatsapp=$request->is_whatsapp;
        $servicedata->price=$request->price;
        $servicedata->unit=$request->unit;
        $servicedata->features=$request->features;
        $servicedata->payment_mode =$request->payment_mode;
        $servicedata->service_highlight=$request->service_highlight;
        $servicedata->from_date=$request->from_date;
        $servicedata->to_date=$request->to_date;
        $servicedata->status=$request->status;
        if (is_array($data['question']) && count($data['question']) > 0) {
            // Loop through each question
            foreach ($data['question'] as $index => $question) {
                // Find the corresponding answer using the index
                $answer = isset($data['answer'][$index]) ? $data['answer'][$index] : null;
        
                // Retrieve the existing FAQ record, if any, based on the question
                $existingFaq = Faq::where('service_id', $id)
                    ->where('question', $question)
                    ->first();
        
                // Check if the record exists
                if ($question !== null) {
                    if ($existingFaq) {
                        // Update the answer if present
                        if ($answer) {
                            $existingFaq->answer = $answer;
                            $existingFaq->save();
                        }
                    } else {
                        // Create a new record for the question and answer
                        $newFaq = new Faq([
                            'service_id' => $id,
                            'question' => $question,
                            'answer' => $answer,
                        ]);
                        $newFaq->save();
                    }
                }
            }
        }
        // if (isset($data['question'])) {
        // $servicedata->question = implode(',',$data['question']);
        // }
        // if (isset($data['answer'])) {
        // $servicedata->answer = implode(',',$data['answer']);
        // }
        // $servicedata->order_quantity=$request->order_quantity;
        $files = [];
        // if ($request->hasFile('image')) {
        //     $images = $request->file('image');
        //     $destination ="uploads/service/".$servicedata->image;
        //     if (File::exists($destination)) {
        //        File::delete($destination);
        //     }
        //     foreach ($images as $image) {
        //         // Generate a unique name for the image
        //         $imageName = time(). '_' . $image->getClientOriginalName();
                
        //         // Move the image to the desired location
        //         $image->move('uploads/service/', $imageName);
                
        //         $files[] = $imageName; 
        //     }
            
            
        // }
        $newImageNames = [];
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $destination = "uploads/service/".$servicedata->image;
            
            // Delete the existing image if it exists
            if (File::exists($destination)) {
                File::delete($destination);
            }
            
            
            
            foreach ($images as $image) {
                // Generate a unique name for the new image
                $imageName = time(). '_' . $image->getClientOriginalName();
                
                // Move the new image to the desired location
                $image->move('uploads/service/', $imageName);
                
                $newImageNames[] = $imageName;
            }
            
            // Update the service's image field with the new image names
            $existingImages = json_decode($servicedata->image);
            if (!empty($existingImages)) {
                $remainingImages = array_intersect($existingImages, $newImageNames);
                $servicedata->image = json_encode($remainingImages);
                
            }else{
                $servicedata->image = json_encode(array_merge($newImageNames, $request->input('existing_images', [])));
            }
            
            
        }
        // $servicedata->image = json_encode($files);
        
        if (empty($seller_info->image) && !empty($newImageNames)) {
            // If $seller_info->image is empty, check if there are any uploaded images from the service folder
            // and update with the first image from the $files array
            $firstImage = reset($newImageNames);
    
            // Copy the first image to the uploads/userdata/ folder
            File::copy("uploads/service/" . $firstImage, "uploads/userdata/" . $firstImage);
    
            // Update the image field of the SellerInfo model with the filename
            $seller_info->image = $firstImage;
        } else {
            // If $seller_info->image is not empty or if there are no uploaded images from the service folder,
            // no changes needed for the image field of the SellerInfo model.
            // You can optionally log or handle this case differently if needed.
        }

        $seller_info->category_id = $request->category_id;
        $servicedata->seo_title = $request->seo_title;
        $servicedata->seo_desc = $request->seo_desc;
        $servicedata->seo_tags = $request->seo_tags;
        
        $seller_info->update();
        $servicedata->update();
        return  redirect()->to($request->last_url)->with('status','Data Updated Successfully');
        // return redirect('/list-service')->with('status', 'Data updated successfully');
    }



    <!-- new code  -->

if ($request->hasFile('image')) {
            $images = $request->file('image');
            $destination = "uploads/service/".$servicedata->image;
            
            // Delete the existing image if it exists
            if (File::exists($destination)) {
                File::delete($destination);
            }
            
            
            
            foreach ($images as $image) {
                // Generate a unique name for the new image
                $imageName = time(). '_' . $image->getClientOriginalName();
                
                // Move the new image to the desired location
                $image->move('uploads/service/', $imageName);
                
                $newImageNames[] = $imageName;
            }
            
            // Update the service's image field with the new image names
            $existingImages = json_decode($servicedata->image);
            if (!empty($existingImages)) {
                $remainingImages = array_intersect($existingImages, $newImageNames);
                $servicedata->image = json_encode($remainingImages);
                
            }else{
                $servicedata->image = json_encode(array_merge($newImageNames, $request->input('existing_images', [])));
            }
            
            
        }
        // $servicedata->image = json_encode($files);
        
        if (empty($seller_info->image) && !empty($newImageNames)) {
            // If $seller_info->image is empty, check if there are any uploaded images from the service folder
            // and update with the first image from the $files array
            $firstImage = reset($newImageNames);
    
            // Copy the first image to the uploads/userdata/ folder
            File::copy("uploads/service/" . $firstImage, "uploads/userdata/" . $firstImage);
    
            // Update the image field of the SellerInfo model with the filename
            $seller_info->image = $firstImage;
        } else {
            // If $seller_info->image is not empty or if there are no uploaded images from the service folder,
            // no changes needed for the image field of the SellerInfo model.
            // You can optionally log or handle this case differently if needed.
        }