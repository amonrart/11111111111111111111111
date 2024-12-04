import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Tam Roi Review',
      theme: ThemeData(
        primarySwatch: Colors.yellow,
        useMaterial3: true,
      ),
      home: const HomePage(),
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 10, // จำนวน tab ที่มี
      child: Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.yellow,
          title: Row(
            children: [
              Image.asset(
                'assets/logo_web_tam_roi_review.png', // ใส่โลโก้ที่มุมซ้าย
                height: 50,
              ),
              const SizedBox(width: 10),
              const Text(
                'Tam Roi Review',
                style: TextStyle(color: Colors.black, fontSize: 24),
              ),
            ],
          ),
          actions: [
            IconButton(
              icon: const Icon(Icons.home),
              onPressed: () {},
              color: Colors.black,
            ),
            IconButton(
              icon: const Icon(Icons.camera_alt),
              onPressed: () {},
              color: Colors.black,
            ),
            IconButton(
              icon: const Icon(Icons.person),
              onPressed: () {},
              color: Colors.black,
            ),
            IconButton(
              icon: const Icon(Icons.menu),
              onPressed: () {},
              color: Colors.black,
            ),
          ],
          bottom: const TabBar(
            isScrollable: true, // ให้เลื่อนซ้ายขวาได้
            indicatorColor: Colors.black,
            labelColor: Colors.black,
            tabs: [
              Tab(text: 'อาหาร'),
              Tab(text: 'แฟชั่น'),
              Tab(text: 'การท่องเที่ยว'),
              Tab(text: 'สุขภาพ'),
              Tab(text: 'การตกแต่งบ้าน'),
              Tab(text: 'สกินแคร์'),
              Tab(text: 'ถ่ายรูป'),
              Tab(text: 'สัตว์เลี้ยง'),
              Tab(text: 'อาชีพ'),
              Tab(text: 'ลดน้ำหนัก'),
            ],
          ),
        ),
        body: TabBarView(
          children: List.generate(10, (index) {
            return Padding(
              padding: const EdgeInsets.all(10.0),
              child: GridView.builder(
                itemCount: 8, // จำนวนไอเทมใน grid
                gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
                  crossAxisCount: 2, // สองคอลัมน์
                  crossAxisSpacing: 10,
                  mainAxisSpacing: 10,
                ),
                itemBuilder: (context, index) {
                  return Container(
                    decoration: BoxDecoration(
                      borderRadius: BorderRadius.circular(10),
                      color: Colors.white,
                      boxShadow: [
                        BoxShadow(
                          color: Colors.grey.withOpacity(0.5),
                          spreadRadius: 2,
                          blurRadius: 5,
                          offset: const Offset(0, 3), // การเลื่อนเงา
                        ),
                      ],
                    ),
                    child: Column(
                      children: [
                        Expanded(
                          child: Image.asset(
                            'assets/food_image.png', // รูปตัวอย่าง
                            fit: BoxFit.cover,
                            width: double.infinity,
                          ),
                        ),
                        Padding(
                          padding: const EdgeInsets.all(8.0),
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              const Text(
                                'ชื่อเมนูอาหาร',
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 16,
                                ),
                              ),
                              const SizedBox(height: 5),
                              Row(
                                children: const [
                                  Icon(Icons.favorite,
                                      color: Colors.red, size: 16),
                                  SizedBox(width: 5),
                                  Text('123'),
                                  SizedBox(width: 10),
                                  Icon(Icons.comment,
                                      color: Colors.grey, size: 16),
                                  SizedBox(width: 5),
                                  Text('45'),
                                ],
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                  );
                },
              ),
            );
          }),
        ),
      ),
    );
  }
}
