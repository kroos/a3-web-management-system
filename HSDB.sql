USE [HSDB]
GO
/****** Object:  Table [dbo].[MERC]    Script Date: 04/29/2012 23:10:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[MERC]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[MERC](
	[HSID] [int] NOT NULL,
	[HSName] [varchar](255) NOT NULL,
	[MasterName] [varchar](255) NOT NULL,
	[Type] [int] NOT NULL,
	[HSLevel] [smallint] NOT NULL,
	[rb] [int] NOT NULL,
	[reset_rb] [int] NOT NULL CONSTRAINT [DF_MERC_reset_rb]  DEFAULT ((0))
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[HSSTONETABLE]    Script Date: 04/29/2012 23:10:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[HSSTONETABLE]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[HSSTONETABLE](
	[MasterName] [char](21) NOT NULL,
	[CreateDate] [smalldatetime] NULL,
	[SaveDate] [smalldatetime] NULL,
	[Slot0] [char](256) NULL,
	[Slot1] [char](256) NULL,
	[Slot2] [char](256) NULL,
	[Slot3] [char](256) NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[HSTABLE]    Script Date: 04/29/2012 23:10:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[HSTABLE]') AND OBJECTPROPERTY(id, N'IsUserTable') = 1)
BEGIN
CREATE TABLE [dbo].[HSTABLE](
	[HSID] [int] IDENTITY(1,1) NOT NULL,
	[HSName] [char](21) NOT NULL,
	[MasterName] [char](21) NOT NULL,
	[Type] [tinyint] NOT NULL,
	[HSLevel] [smallint] NOT NULL,
	[HSExp] [bigint] NOT NULL,
	[Ability] [char](256) NOT NULL,
	[CreateDate] [smalldatetime] NOT NULL,
	[SaveDate] [smalldatetime] NOT NULL,
	[HSState] [tinyint] NULL,
	[DelDate] [smalldatetime] NULL,
	[HSBody] [char](1024) NOT NULL
) ON [PRIMARY]
END
GO
SET ANSI_PADDING OFF
GO
