flowchart TD
    Start([Start])
    A[Customer xem sản phẩm]
    B[Chọn biến thể]
    C[Thêm vào giỏ hàng]
    D[Xem giỏ hàng]
    E[Đặt hàng]
    F{Chọn phương thức thanh toán}
    G[Thanh toán Online]
    H{Thanh toán thành công?}
    I[Tạo đơn hàng Confirmed]
    J[Quay lại thanh toán]
    K[Thanh toán COD]
    L[Gửi đơn về hệ thống]
    M[Warehouse xử lý đơn]
    End([End])

    Start --> A --> B --> C --> D --> E --> F
    F -->|Online| G --> H
    H -->|Yes| I --> L
    H -->|No| J --> F
    F -->|COD| K --> I
    L --> M --> End
